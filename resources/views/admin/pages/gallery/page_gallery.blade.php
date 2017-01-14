@extends('app-admin')
@section('admin-content')
    {!! HTML::style( asset('assets/admin/plugins/css/bootstrap.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/css/font-awesome.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/css/colorbox.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/css/ace-fonts.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/css/ace.css')) !!}

    {!! HTML::style( asset('assets/admin/plugins/css/ace.onpage-help.css')) !!}
    {!! HTML::style( asset('assets/admin/plugins/css/sunburst.css')) !!}

    <style type="text/css">
        .add_gallery{
            display: block;
            width: 235px;
            margin: 0 auto;
            cursor: pointer;
        }
        .add_gallery:hover{
            opacity: 0.7;
        }
        .gallery_icon{
            font-size: 86px;
        }
        .gallery_file{
            display: none!important;
        }
        .add_gal_button{
            margin-top:15px;

        }
    </style>


    <div class="panel with-nav-tabs panel-default">
        <div class="panel-heading">
            <ul class="nav nav-tabs">
                <li class="active"><a class="locums_tab" href="#add_gallery" data-toggle="tab">Add Gallery</a></li>
                <li><a class="locums_tab" href="#gallery_list" data-toggle="tab">Gallery List</a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="add_gallery">
                <h1>Add Gallery Images</h1>

                @include('message')

                {!! Form::open(['action' => ['AdminController@postAddPageGallery',$page_id,$category_id] ,'class' => 'form-horizontal','files' =>true  ]) !!}

                {!! Form::file('image[]', array('multiple'=>true,'class'=>'gallery_file')) !!}

                <span class="add_gallery">
                    <span class="bigger-150 bolder"><i class="ace-icon fa fa-caret-right red"></i> Drop files</span> to upload
                    <span class="smaller-80 grey">(or click)</span> <br>
                    <i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x article_file_icon gallery_icon"></i>
                </span>

                <button type="submit" class="btn btn-warning add_gal_button">
                    <span class="glyphicon glyphicon-ok-sign"></span>Add
                </button>

                {!! Form::close() !!}
            </div>





    <div class="tab-pane fade" id="gallery_list">
        <div class="locum-files-view">
            {{--Slider Gallery--}}
            <div class="main-content">
                <div class="main-content-inner">


                    <!-- /section:basics/content.breadcrumbs -->
                    <div class="page-content">
                        <!-- #section:settings.box -->


                        <!-- /section:settings.box -->
                        <div class="page-header">
                            <h1>
                                Gallery
                                <small>
                                    <i class="ace-icon fa fa-angle-double-right"></i>
                                    @if(count($gallerys) == 0)
                                        not gallery image
                                    @else
                                        responsive photo gallery using colorbox
                                    @endif

                                </small>
                            </h1>
                        </div><!-- /.page-header -->

                        <div class="row">
                            <div class="col-xs-12">
                                <!-- PAGE CONTENT BEGINS -->
                                <div>
                                    <ul class="ace-thumbnails clearfix">
                                        <!-- #section:pages/gallery -->
                                        @foreach($gallerys as $image)

                                            <li>
                                                <a href="/page_uploade/page_gallery/{{$image->image}}" title="Photo Title" data-rel="colorbox">
                                                    <img width="150" height="150" alt="150x150" src="/page_uploade/page_gallery/{{$image->image}}" />
                                                </a>

                                                <div class="tags">
													<span class="label-holder">
														<span class="label label-info">breakfast</span>
													</span>

													<span class="label-holder">
														<span class="label label-danger">fruits</span>
													</span>

													<span class="label-holder">
														<span class="label label-success">toast</span>
													</span>

													<span class="label-holder">
														<span class="label label-warning arrowed-in">diet</span>
													</span>
                                                </div>

                                                <div class="tools">
                                                    <a href="#">
                                                        <i data-id='{{$image->id}}' content="{{ csrf_token() }}" data-toggle="modal" data-target="#myModal1" class="ace-icon fa fa-link resize_icon"></i>
                                                    </a>

                                                    <a href="{{action('AdminController@getGalleryCropImage',[$image->id,$page_id,$category_id])}}">
                                                        <i class="ace-icon fa fa-paperclip"></i>
                                                    </a>

                                                    <a href="#">
                                                        <i data-toggle="modal" data-target="#myModal" data-id='{{$image->id}}' class="ace-icon fa fa-pencil galery_edit"></i>
                                                    </a>
                                                    <a  href="#">
                                                        <i data-id='{{$image->id}}' class="ace-icon fa fa-times red galery_delete"></i>
                                                    </a>
                                                </div>
                                            </li>

                                        @endforeach

                                    </ul>
                                </div><!-- PAGE CONTENT ENDS -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.page-content -->
                </div>
            </div><!-- /.main-content -->


            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-body">
                            <input content="{{ csrf_token() }}" type="file" style="display:none" class="gallery_image_modal_edit">
                            <img style="width:100%;cursor:pointer" src="" class="gallery_image_modal">
                            <img class="img_loading" style="display: none;position: absolute;top: 41%;left: 41%;" src="/assets/admin/images/ajax-loader.gif">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Save</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">

                        <div class="modal-body">
                            <h1>Resize your image</h1>
                            <img class="img_loading1" style="display: none;position: absolute;top: 41%;left: 41%;" src="/assets/admin/images/ajax-loader.gif">
                            <input style="margin-bottom:12px;" type="number" class="form-control gal_image_width" placeholder="width">
                            <input type="number" class="form-control gal_image_height" placeholder="height">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default resize_image" >Save</button>
                        </div>
                    </div>

                </div>
            </div>
            {{--end Slider Gallery--}}
        </div>
    </div>

    </div>
</div>




@endsection

@section('script')

    <script type="text/javascript">
        jQuery(function($) {
            var $overflow = '';
            var colorbox_params = {
                rel: 'colorbox',
                reposition:true,
                scalePhotos:true,
                scrolling:false,
                previous:'<i class="ace-icon fa fa-arrow-left"></i>',
                next:'<i class="ace-icon fa fa-arrow-right"></i>',
                close:'&times;',
                current:'{current} of {total}',
                maxWidth:'100%',
                maxHeight:'100%',
                onOpen:function(){
                    $overflow = document.body.style.overflow;
                    document.body.style.overflow = 'hidden';
                },
                onClosed:function(){
                    document.body.style.overflow = $overflow;
                },
                onComplete:function(){
                    $.colorbox.resize();
                }
            };

            $('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
            $("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon


            $(document).one('ajaxloadstart.page', function(e) {
                $('#colorbox, #cboxOverlay').remove();
            });
        })


    </script>
@endsection

@section('script')


    {!! HTML::script( asset('assets/admin/plugins/js/ace/elements.onpage-help.js') ) !!}
    {!! HTML::script( asset('assets/admin/plugins/js/ace/ace.onpage-help.js') ) !!}
    {!! HTML::script( asset('assets/admin/plugins/js/rainbow.js') ) !!}
    {!! HTML::script( asset('assets/admin/plugins/js/language/generic.js') ) !!}
    {!! HTML::script( asset('assets/admin/plugins/js/language/html.js') ) !!}
    {!! HTML::script( asset('assets/admin/plugins/js/language/css.js') ) !!}
    {!! HTML::script( asset('assets/admin/plugins/js/language/javascript.js') ) !!}

@endsection
