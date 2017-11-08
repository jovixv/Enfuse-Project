<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Dashboard - <?php echo env('APP_NAME');?></title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/dropzone.min.css" />
    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
    <link rel="stylesheet" href="assets/css/jquery.gritter.min.css" />
    <link rel="stylesheet" href="assets/css/prettify.min.css" />


    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default          ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
        </button>

        <div class="navbar-header pull-left">
            <a href="index.html" class="navbar-brand">
                <small>
                    <i class="fa fa-leaf"></i>
                    <?php echo env('APP_NAME');?>
                </small>
            </a>
        </div>

    </div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
    <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
    </script>

    <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
        <script type="text/javascript">
            try{ace.settings.loadState('sidebar')}catch(e){}
        </script>


        <button id="loading-btn" style="width:100%;" type="button" class="btn btn-success" data-loading-text="Loading...">Enfuse</button>
        <br/>
        <button  id="preview-btn" type="button" style="width:100%;" class="btn btn-primary active" data-toggle="button" aria-pressed="true">Preview Image</button>
        <button  id="multi-btn" type="button" style="width:100%;" class="btn btn-primary active" data-toggle="button" aria-pressed="true">Multi-Handler</button>

        <input id="gritter-light" checked="" type="checkbox" class="ace ace-switch ace-switch-5" />
    </div>

    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs">
                <ul class="breadcrumb">
                    <li>
                        <i class="ace-icon fa fa-home home-icon"></i>
                        <a href="#">Home</a>
                    </li>
                    <li class="active">Web Enfuse</li>
                </ul><!-- /.breadcrumb -->

                <div class="nav-search" id="nav-search">
                    <form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
                    </form>
                </div><!-- /.nav-search -->
            </div>
            <div class="page-content">


                <div class="page-header">
                    <h1>
                        Web Enfuse
                        <small>
                            <i class="ace-icon fa fa-angle-double-right"></i>

                        </small>
                    </h1>
                </div><!-- /.page-header -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="preview-image">
                            <a id="preview-image" target="_blank" href="imageLibrary/preview/preview.jpg" data-rel="colorbox" class="cboxElement">

                            </a>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <!-- PAGE CONTENT BEGINS -->
                        <!--div class="alert alert-info">
                            <i class="ace-icon fa fa-hand-o-right"></i>

                            Please note that demo server is not configured to save uploaded files, therefore you may get an error message.
                            <button class="close" data-dismiss="alert">
                                <i class="ace-icon fa fa-times"></i>
                            </button>
                        </div-->

                        <div>
                            <form action="<?php echo url('/upload/'); ?>" enctype="multipart/form-data" class="dropzone well" id="dropzone">
                                {{ csrf_field() }}
                                <div class="fallback">
                                    <input name="file" type="file" multiple="" />
                                </div>
                            </form>
                        </div>

                        <div id="preview-template" class="hide">
                            <div class="dz-preview dz-file-preview">
                                <div class="dz-image">
                                    <img data-dz-thumbnail="" />
                                    <input type="hidden" name="image[]" value="" />
                                </div>

                                <div class="dz-details">
                                    <div class="dz-size">
                                        <span data-dz-size=""></span>
                                    </div>

                                    <div class="dz-filename">
                                        <span data-dz-name=""></span>
                                    </div>
                                </div>

                                <div class="dz-progress">
                                    <span class="dz-upload" data-dz-uploadprogress=""></span>
                                </div>

                                <div class="dz-error-message">
                                    <span data-dz-errormessage=""></span>
                                </div>

                                <div class="dz-success-mark">
											<span class="fa-stack fa-lg bigger-150">
												<i class="fa fa-circle fa-stack-2x white"></i>

												<i class="fa fa-check fa-stack-1x fa-inverse green"></i>
											</span>
                                </div>

                                <div class="dz-error-mark">
											<span class="fa-stack fa-lg bigger-150">
												<i class="fa fa-circle fa-stack-2x white"></i>

												<i class="fa fa-remove fa-stack-1x fa-inverse red"></i>
											</span>
                                </div>
                            </div>
                        </div><!-- PAGE CONTENT ENDS -->

                    </div><!-- /.col -->

                </div><!-- /.row -->

                <div class="col-xs-4" style="border: 1px solid #e2e2e2;">
                    <label class="control-label bolder blue">Fusion options</label>
                        <span>
                            <form action="<?php echo url('/ajax/');?>" class="form-horizontal" id="spinner-opts">

                                <label class="inline">
                                     <small class="lighter">Exp:</small>
                                        <input class="hidden" type="text" name="exposure-weight" data-min="0" data-max="1" data-step="0.001" value="1" />
                                        <input type="number" name="exposure-weight_number" value="1" min="0" max="1" step="0.01">
                                </label>

                                <label class="inline">
                                     <small class="lighter">Cont:</small>
                                        <input class="hidden" type="text" name="contrast-weight" data-min="0" data-max="1" data-step="0.001" value="0" />
                                        <input type="number" name="contrast-weight_number" value="0" min="0" max="1" step="0.01">
                                </label>

                                <label class="inline">
								 <small class="lighter">Sat:</small>
                                    <input class="hidden" type="text" name="saturation-weight" data-min="0" data-max="1" data-step="0.001" value="0" />
                                    <input type="number" name="saturation-weight_number" value="0" min="0" max="1" step="0.01">
                                </label>

                                <label class="inline">
								 <small class="lighter">Mu:</small>
                                    <input class="hidden" type="text" name="exposure-mu" data-min="0" data-max="1" data-step="0.001" value="0" />
                                     <input type="number" name="exposure-mu_number" value="0" min="0" max="1" step="0.01">
                                </label>


                                <label class="inline">
								 <small class="lighter">Sigma:</small>
                                    <input class="hidden" type="text" name="exposure-sigma" data-min="0" data-max="1" data-step="0.001" value="0" />
                                    <input type="number" name="exposure-sigma_number" value="0" min="0" max="1" step="0.01">
                                </label>

                                <div class="checkbox">
									<label>
										<input name="hard-mask" type="checkbox" class="ace" />
										<span class="lbl">  Force hard blend mask</span>
									</label>
								</div>

                                <div class="checkbox">
									<label>
										<input name="align" type="checkbox" class="ace" />
										<span class="lbl">  Use image_align_stack</span>
									</label>
								</div>

                            </form>
                        </span>

                </div>


            <form > <!-- Form for ajax-->
                <div class="col-xs-4" style="border: 1px solid #e2e2e2;">
                    <label class="control-label bolder blue">Common options</label>
                    <div>

                        <div class="checkbox">
                            <label>
                                <input name="wrap" type="checkbox" class="ace" />
                                <span class="lbl">Blend across -180/+180 boundary</span>
                            </label>
                        </div>

                        <div class="checkbox">
                            <label>
                                <input name="verbose" type="checkbox" class="ace" />
                                <span class="lbl">Verbose</span>
                            </label>
                        </div>

                        <div>
                            <span>Levels</span>
                            <input type="number" name="levels" value="None" min="1" max="100" step="1">

                        </div>

                        <div>
                            <span>Bits</span>
                            <input type="number" name="depth" value="None" min="1" max="100" step="1">

                        </div>

                        <div>
                            <span>C-Win-Size</span>
                            <input type="number" name="contrast-window-size" value="None" min="1" max="100" step="1">
                        </div>

                        <label class="control-label bolder blue">Compression</label>

                        <div>
                            <label for="form-field-select-1">TIFF</label>

                            <select class="form-control" name="compression" id="form-field-select-1">
                                <option value="">None</option>
                                <option value="PACKBITS">Packbits</option>
                                <option value="LZW">LZW</option>
                                <option value="DEFLATE">Deflate</option>
                            </select>
                        </div>

                        <span>JPEG</span>
                        <input type="number" name="compression_jpg" value="default" min="1" max="100" step="1">

                    </div>
                </div>

                <div class="col-xs-4" style="border: 1px solid #e2e2e2;">
                        <label class="control-label bolder blue">Extended options</label>
                        <div>

                            <div class="checkbox">
                                <label>
                                    <input name="ciecam" type="checkbox" class="ace" />
                                    <span class="lbl">Use CIECAM02 to blend colors</span>
                                </label>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input name="-g" type="checkbox" class="ace" />
                                    <span class="lbl">Associated-alpha hack</span>
                                </label>
                            </div>

                            <div>
                                <span>Block size</span>
                                <input type="text" name="-b" value="None" min="1" max="100" step="1">
                            </div>

                            <div>
                                <span>Cache size</span>
                                <input type="text" name="-m" value="None" min="1" max="100" step="1">
                            </div>

                            <!--label class="control-label bolder blue">Output image - Size/Position</label>


                            <div>
                                <span>Width</span>
                                <input type="text" name="t" value="None" min="1" max="100" step="1">

                            </div>

                            <div>
                                <span>Height</span>
                                <input type="text" name="t" value="None" min="1" max="100" step="1">
                            </div>

                            <div>
                                <span>x Offset</span>
                                <input type="text" name="t" value="None" min="1" max="100" step="1">
                            </div>

                            <div>
                                <span>y Offset</span>
                                <input type="text" name="t" value="None" min="1" max="100" step="1">
                            </div-->

                        </div>
                </div>
            </form>



                    <div class="col-xs-12" style="border: 1px solid #e2e2e2;">

                        <div class="widget-box">
                            <div class="widget-header widget-header-flat">
                                <h4 class="smaller">
                                    <i class="ace-icon fa fa-code"></i>
                                    Console is from an application
                                </h4>
                            </div>

                            <div class="widget-body">
                                <div class="widget-main">
                                    <pre class="prettyprint linenums prettyprinted" style="background-color: black;overflow: scroll;height: 400px;">

                                    </pre>
                                </div>
                            </div>
                        </div>
                    </div>


            </div><!-- /.page-content -->
        </div>
    </div><!-- /.main-content -->

    <div class="footer">
        <div class="footer-inner">
            <div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Web tools for Enfuse </span>
							Application &copy; Jovix 2017
						</span>

                &nbsp; &nbsp;
                <span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
            </div>
        </div>
    </div>

    <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
    </a>
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="assets/js/jquery-2.1.4.min.js"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->

<!--[if lte IE 8]>
<script src="assets/js/excanvas.min.js"></script>
<![endif]-->
<script src="assets/js/jquery-ui.custom.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
<script src="assets/js/bootbox.js"></script>
<script src="assets/js/jquery.easypiechart.min.js"></script>
<script src="assets/js/jquery.gritter.min.js"></script>
<script src="assets/js/spin.js"></script>
<script src="assets/js/enfuse.js"></script>



<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
</script>

<script src="assets/js/bootstrap.min.js"></script>

<!-- page specific plugin scripts -->
<script src="assets/js/dropzone.min.js"></script>

<!-- ace scripts -->
<script src="assets/js/ace-elements.min.js"></script>
<script src="assets/js/ace.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($){

        try {
            Dropzone.autoDiscover = false;

            var myDropzone = new Dropzone('#dropzone', {
                previewTemplate: $('#preview-template').html(),

                thumbnailHeight: 120,
                thumbnailWidth: 120,
                maxFilesize: 250,

                //addRemoveLinks : true,
                //dictRemoveFile: 'Remove',

                dictDefaultMessage :
                    '<span class="bigger-150 bolder"><i class="ace-icon fa fa-caret-right red"></i> Drop files</span> to upload \
                    <span class="smaller-80 grey">(or click)</span> <br /> \
                    <i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i>'
                ,

                thumbnail: function(file, dataUrl) {

                    if (file.previewElement) {
                        $(file.previewElement).removeClass("dz-file-preview");
                        var images = $(file.previewElement).find("[data-dz-thumbnail]").each(function() {
                            var thumbnailElement = this;
                            thumbnailElement.alt = file.name;
                            thumbnailElement.src = dataUrl;

                        });

                        setTimeout(function() { $(file.previewElement).addClass("dz-image-preview"); }, 1);
                    }

                }

            });
        //add all formats to input
            myDropzone.on('addedfile',function(file){
                $(file.previewElement).find('.dz-image input[type=hidden]').each(function () {
                    this.value = file.name;
                });
            });

            //remove dropzone instance when leaving this page in ajax mode
            $(document).one('ajaxloadstart.page', function(e) {
                try {
                    myDropzone.destroy();
                } catch(e) {}
            });

        } catch(e) {
            alert('Dropzone.js does not support older browsers!');
        }

    });
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        /**
         $('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
				  //console.log(e.target.getAttribute("href"));
				})

         $('#accordion').on('shown.bs.collapse', function (e) {
					//console.log($(e.target).is('#collapseTwo'))
				});
         */

        $('#myTab a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            //if($(e.target).attr('href') == "#home") doSomethingNow();
        })


        /**
         //go to next tab, without user clicking
         $('#myTab > .active').next().find('> a').trigger('click');
         */


        $('#accordion-style').on('click', function(ev){
            var target = $('input', ev.target);
            var which = parseInt(target.val());
            if(which == 2) $('#accordion').addClass('accordion-style2');
            else $('#accordion').removeClass('accordion-style2');
        });

        //$('[href="#collapseTwo"]').trigger('click');


        $('.easy-pie-chart.percentage').each(function(){
            $(this).easyPieChart({
                barColor: $(this).data('color'),
                trackColor: '#EEEEEE',
                scaleColor: false,
                lineCap: 'butt',
                lineWidth: 8,
                animate: ace.vars['old_ie'] ? false : 1000,
                size:75
            }).css('color', $(this).data('color'));
        });

        $('[data-rel=tooltip]').tooltip();
        $('[data-rel=popover]').popover({html:true});


        $('#gritter-regular').on(ace.click_event, function(){
            $.gritter.add({
                title: 'This is a regular notice!',
                text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="blue">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                image: 'assets/images/avatars/avatar1.png', //in Ace demo ./dist will be replaced by correct assets path
                sticky: false,
                time: '',
                class_name: (!$('#gritter-light').get(0).checked ? 'gritter-light' : '')
            });

            return false;
        });

        $('#gritter-sticky').on(ace.click_event, function(){
            var unique_id = $.gritter.add({
                title: 'This is a sticky notice!',
                text: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="red">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                image: 'assets/images/avatars/avatar.png',
                sticky: true,
                time: '',
                class_name: 'gritter-info' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
            });

            return false;
        });


        $('#gritter-without-image').on(ace.click_event, function(){
            $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'This is a notice without an image!',
                // (string | mandatory) the text inside the notification
                text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="orange">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                class_name: 'gritter-success' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
            });

            return false;
        });


        $('#gritter-max3').on(ace.click_event, function(){
            $.gritter.add({
                title: 'This is a notice with a max of 3 on screen at one time!',
                text: 'This will fade out after a certain amount of time. Vivamus eget tincidunt velit. Cum sociis natoque penatibus et <a href="#" class="green">magnis dis parturient</a> montes, nascetur ridiculus mus.',
                image: 'assets/images/avatars/avatar3.png', //in Ace demo ./dist will be replaced by correct assets path
                sticky: false,
                before_open: function(){
                    if($('.gritter-item-wrapper').length >= 3)
                    {
                        return false;
                    }
                },
                class_name: 'gritter-warning' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
            });

            return false;
        });


        $('#gritter-center').on(ace.click_event, function(){
            $.gritter.add({
                title: 'This is a centered notification',
                text: 'Just add a "gritter-center" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
                class_name: 'gritter-info gritter-center' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
            });

            return false;
        });

        $('#gritter-error').on(ace.click_event, function(){
            $.gritter.add({
                title: 'This is a warning notification',
                text: 'Just add a "gritter-light" class_name to your $.gritter.add or globally to $.gritter.options.class_name',
                class_name: 'gritter-error' + (!$('#gritter-light').get(0).checked ? ' gritter-light' : '')
            });

            return false;
        });


        $("#gritter-remove").on(ace.click_event, function(){
            $.gritter.removeAll();
            return false;
        });


        ///////


        $("#bootbox-regular").on(ace.click_event, function() {
            bootbox.prompt("What is your name?", function(result) {
                if (result === null) {

                } else {

                }
            });
        });

        $("#bootbox-confirm").on(ace.click_event, function() {
            bootbox.confirm("Are you sure?", function(result) {
                if(result) {
                    //
                }
            });
        });

        /**
         $("#bootbox-confirm").on(ace.click_event, function() {
					bootbox.confirm({
						message: "Are you sure?",
						buttons: {
						  confirm: {
							 label: "OK",
							 className: "btn-primary btn-sm",
						  },
						  cancel: {
							 label: "Cancel",
							 className: "btn-sm",
						  }
						},
						callback: function(result) {
							if(result) alert(1)
						}
					  }
					);
				});
         **/


        $("#bootbox-options").on(ace.click_event, function() {
            bootbox.dialog({
                message: "<span class='bigger-110'>I am a custom dialog with smaller buttons</span>",
                buttons:
                    {
                        "success" :
                            {
                                "label" : "<i class='ace-icon fa fa-check'></i> Success!",
                                "className" : "btn-sm btn-success",
                                "callback": function() {
                                    //Example.show("great success");
                                }
                            },
                        "danger" :
                            {
                                "label" : "Danger!",
                                "className" : "btn-sm btn-danger",
                                "callback": function() {
                                    //Example.show("uh oh, look out!");
                                }
                            },
                        "click" :
                            {
                                "label" : "Click ME!",
                                "className" : "btn-sm btn-primary",
                                "callback": function() {
                                    //Example.show("Primary button");
                                }
                            },
                        "button" :
                            {
                                "label" : "Just a button...",
                                "className" : "btn-sm"
                            }
                    }
            });
        });



        $('#spinner-opts small').css({display:'inline-block', width:'60px'})

        var slide_styles = [''];
        var ii = 0;
        $("#spinner-opts input[type=text]").each(function() {
            var $this = $(this);
            $this.hide().after('<span />');
            $this.next().addClass('ui-slider-small').
            addClass("inline ui-slider-"+slide_styles[ii++ % slide_styles.length]).
            css('width','120px').slider({
                value:parseInt($this.val()),
                range: "min",
                animate:true,
                min: parseInt($this.attr('data-min')),
                max: parseInt($this.attr('data-max')),
                step: parseFloat($this.attr('data-step')) || 1,
                slide: function( event, ui ) {
                    $this.val(ui.value);

                    spinner_update();
                }
            });
        });



        //CSS3 spinner
        $.fn.spin = function(opts) {
            this.each(function() {
                var $this = $(this),
                    data = $this.data();

                if (data.spinner) {
                    data.spinner.stop();
                    delete data.spinner;
                }
                if (opts !== false) {
                    data.spinner = new Spinner($.extend({color: $this.css('color')}, opts)).spin(this);
                }
            });
            return this;
        };

        function spinner_update() {
            var opts = {};
            var test = {};
            $('#spinner-opts input[type=text]').each(function() {
                opts[this.name] = parseFloat(this.value);

            });

            opts['left'] = 'auto';


            $('#spinner-opts input[type=number]').each(function(){
             name = this.name.replace('_number','');
             number = opts[name];

                if (number){
                    this.value = number;
                }


            });


            //$('#spinner-preview').spin(opts);
        }



        $('#id-pills-stacked').removeAttr('checked').on('click', function(){
            $('.nav-pills').toggleClass('nav-stacked');
        });






        ///////////
        $(document).one('ajaxloadstart.page', function(e) {
            $.gritter.removeAll();
            $('.modal').modal('hide');
        });

    });
</script>

</body>
</html>
