@extends('backend.layouts.main')
@section('page_main_section')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="container">
                <h1 class="text-center pt-2"><u>Supplier DashBoard</u></h1>
            </div>
            <form action="{{ route('supplier.products.save') }}" method="post">
                @csrf
                <div class="container form-container mt-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Supplier</label>
                                <select id="" class="custom-select supplier_selection" name="supplier">
                                    <option value="">Choose Supplier</option>
                                    @forelse ($allSuppliers as $item)
                                        <option value="{{ $item->id }}">{{ $item->supplier_name }}</option>
                                    @empty
                                        <option value="">No Supplier Found</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        @php
                            $bill_no_generator = \DB::table('supplier_bill_detail')
                                ->latest()
                                ->get();
                            $b_n;
                            $latest_bill_no;
                            foreach ($bill_no_generator as $items) {
                                $b_n = $items->bill_no;
                            }
                            if (!empty($b_n)) {
                                $last_number = substr($b_n, 6);
                                $new_last_number = ++$last_number;
                                $latest_bill_no = 'AMD' . '_' . '00' . $new_last_number;
                            } else {
                                $latest_bill_no = 'AMD' . '_' . '001';
                            }
                        @endphp
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Bill Number:</label>
                                <input id="" class="form-control" type="text" name="bill_no"
                                    value="{{ $latest_bill_no }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row main-row">
                        <div class="col-3">
                            <div class="form-group">
                                <label for="">Choose Product</label>
                                <select id="" class="custom-select supplier" name="product_id[]">
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Cost Price</label>
                                <input id="" class="form-control cost_price" type="text" name="cp[]">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Pieces</label>
                                <input id="" class="form-control pieces" type="text" name="pieces[]">
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Tax% on SP</label>
                                <input id="" class="form-control tax" type="text" name="tax[]">
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="form-group">
                                <label for="">Total</label>
                                <input id="" class="form-control total" type="text" name="total[]"
                                    value="" readonly>
                            </div>
                        </div>
                        <div class="col-1">
                            <div class="form-group">
                                <label for="my-input">Action</label>
                                <span class="add_button"><i style="display: block; font-size: 20px; color:green;"
                                        class="fas fa-plus pt-2"></i></span>
                                <span class="trash_button"> <i
                                        style="display: none; font-size: 20px; color:red;"class="fas fa-trash  pt-2"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row sub_total">
                        <div class="col-9">
                            <h2 class="text-right">Sub Total</h2>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <input id="" class="form-control subs_total" type="text" name=""
                                    readonly>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success float-right" name="submit">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {

            $('.add_button').click(function(e) {
                e.preventDefault();

                var this_button = $(this);
                var trash_button = $(this_button).siblings().children();

                var distinct_form = $(this_button).parent().parent().parent();

                var copied_row = $(distinct_form).clone(true, true);

                var cp = $(copied_row).find('.cost_price');
                var pieces = $(copied_row).find('.pieces');
                var tax = $(copied_row).find('.tax');
                var total = $(copied_row).find('.total');

                $(cp).val('');
                $(pieces).val('');
                $(tax).val('');
                $(total).val('');

                $(this_button).css("display", "none");
                $(trash_button).css("display", "block");
                $('.sub_total').before(copied_row);
            });


            $('.supplier_selection').on('change', function() {
                var current_value = $(this).val();
                var select_option = $(this).parent().parent().parent().next().find("select.supplier");
                $(select_option).empty();

                $.ajax({
                    type: "get",
                    url: "{{ route('supplier.products') }}",
                    data: {
                        supplier_id: current_value,
                    },
                    success: function(response) {
                        var all = response.relativeProducts;
                        $(all).each(function(index, element) {
                            $(select_option).append(
                                '<option value=' + element.id + '>' + element
                                .product_name + '</option>'
                            );
                        });

                    }
                });
            });

            $('.cost_price').on('input', function() {
                var current_cp = $(this).val();

                var stock_value = $(this).parent().parent().parent().find('.pieces').val();

                if ($.isNumeric(current_cp) && $.isNumeric(stock_value)) {
                    var relative_total = $(this).parent().parent().parent().find('.total');
                    $(relative_total).val(stock_value * current_cp);
                } else {
                    var relative_total = $(this).parent().parent().parent().find('.total');
                    $(relative_total).val('');
                }
                var sum = 0;
                $(".total").each(function(index, element) {
                    var total_values = parseInt($(element).val());
                    if ($.isNumeric(total_values)) {
                        sum += total_values;
                        $(".subs_total").val(sum);
                    } else {
                        $(".subs_total").val('');
                    }
                });
            });

            $('.pieces').on('input', function() {
                var current_pieces = $(this).val();

                var cp_value = $(this).parent().parent().parent().find('.cost_price').val();

                if ($.isNumeric(current_pieces) && $.isNumeric(cp_value)) {
                    var relative_total = $(this).parent().parent().parent().find('.total');
                    $(relative_total).val(current_pieces * cp_value);
                } else {
                    var relative_total = $(this).parent().parent().parent().find('.total');
                    $(relative_total).val('');
                }

                var sum = 0;
                $(".total").each(function(index, element) {
                    var total_values = parseInt($(element).val());
                    if ($.isNumeric(total_values)) {
                        sum += total_values;
                        $(".subs_total").val(sum);
                    } else {
                        $(".subs_total").val('');
                    }
                });
            });

            $(".trash_button").on("click", function() {
                var this_button = $(this);
                var desired_row = $(this_button).parent().parent().parent();

                var delete_input = $(this_button).parent().parent().parent().find(".total").val();
                var parsed_delete_value = parseInt(delete_input);

                var sub_total_value = $(this_button).parent().parent().parent().parent().find(
                    '.subs_total').val();
                var parsed_sub_total_value = parseInt(sub_total_value);

                $(".subs_total").val(parsed_sub_total_value - parsed_delete_value);

                $(desired_row).remove();
            });
        });
    </script>
@endsection
