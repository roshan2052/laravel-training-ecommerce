@extends('frontend.layouts.master')

@section('title')
    Subcategory Details
@endsection

@section('content')
<!-- Start Our Product Area -->
<section class="htc__product__area shop__page ptb--130 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            <section id="breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $sub_category->category->name }}</li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $sub_category->name }}</li>
                    </ol>
                </nav>
            </section>
        </div><!--col-->
    </div>
    <div class="htc__product__container">
        <!-- Start Product MEnu -->
        <div class="row">
            <div class="col-md-4">
                <select class="form-control" aria-label="Default select example">
                    <option selected>Search By Brand</option>
                    <option value="1">Samsung</option>
                    <option value="2">Nokia</option>
                    <option value="3">Vivo</option>
                    </select>
            </div>
            <div class="col-md-4">
                {{ Form::select('sort_by_price',$data['sort_by_price'], null, ['class' => 'form-control sort-by', 'placeholder' => 'Sort By Price']) }}
            </div>
            <div class="col-md-4">
                <select class="form-control" aria-label="Default select example">
                    <option selected>Search By Product Title</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    </select>
            </div>

        </div>

        <!-- End Product MEnu -->
        <div class="container">
        <div class="row col-10">
            <div class="product__list another-product-style">
                    {{-- products load here --}}
            </div>
        </div>
        <!-- Start Load More BTn -->
        <div class="row mt--60">
            <div class="col-md-12">
                <div class="htc__loadmore__btn">
                    <button class="btn btn-primary" id="load-more" data-paginate="2">Load more...</button>
                    <p class="no_more_product invisible">No more products...</p>
                </div>
            </div>
        </div>
        </div>
        <!-- End Load More BTn -->
    </div>
    </div>
</section>
<!-- End Our Product Area -->
@endsection

@section('js')

<script type="text/javascript">
        var sort_by  = $(".sort-by").val();
        var endpoint = "{{ route('product_by_subcategory',[$sub_category->category->slug,$sub_category->slug]) }}";
        var paginate = 1;
        loadMoreData(paginate);

        $('#load-more').click(function() {
            var page = $(this).data('paginate');
            var sort_by = $('.sort-by').val();
            loadMoreData(page,sort_by ?? null);
            $(this).data('paginate', page+1);
        });
        // run function when user click load more button
        function loadMoreData(paginate,sort_by=null) {
            $.ajax({
                url: endpoint + '?page=' + paginate,
                data: {
                    'sort_by' : sort_by
                },
                type: 'get',
                datatype: 'html',
                beforeSend: function() {
                    $('#load-more').text('Loading...');
                }
            })
            .done(function(data) {
                if(data.length == 0) {
                    $('.no_more_product').removeClass('invisible');
                    $('#load-more').hide();
                } else {
                    $('#load-more').show();
                    $('.no_more_product').addClass('invisible');
                    $('#load-more').text('Load more...');
                    $('.product__list').append(data);
                }
            })
            .fail(function() {
                alert('Something went wrong.');
            });
        }

        $('.sort-by').change(function() {
            var sort_by = $(this).val();
            var page_no = 1;
            clearPreviousData();
            sort_by.length > 1 ? loadMoreData(page_no,sort_by) : loadMoreData(page_no);
            $('#load-more').data('paginate', page_no+1);
        });

        function clearPreviousData(){
            $('.product__list').empty();
        }

    </script>
@endsection
