<script type="text/javascript">

    var editor_config = {
        path_absolute : "/",
        selector: 'textarea',
        relative_urls: false,
        height : 400,
        directionality: "rtl",
        statusbar: false,
        language: 'fa_IR', // site absolute URL
        external_plugins: {
            'directionality': '{{ asset('assets/Back/plugin/tinymce/plugins/directionality/plugin.min.js') }}',
            'language': '{{ asset('assets/Back/plugin/tinymce/plugins/langs/fa_IR.js') }}',
        },
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak ",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern language"
        ],

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media |rtl ltr",
        file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.openUrl({
                url : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no",
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };

    tinymce.init(editor_config);
</script>
