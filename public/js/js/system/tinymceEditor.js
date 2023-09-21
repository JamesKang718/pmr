// path : js/tinymceEditor.js
var tabEditor = {
    language:'zh_TW',
    height:150,
    toolbar_items_size : 'large',
    selector: "textarea.tinymceEditor",
    menubar:false,
    plugins: [
        "nonbreaking textcolor colorpicker textpattern fullscreen"
    ],
    toolbar: "fontselect fontsizeselect | forecolor backcolor |  bold italic | alignleft aligncenter alignright | bullist numlist outdent indent fullscreen",

    fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 20pt 24pt 28pt 30pt 34pt 36pt 40pt 42pt 46pt',
};
tinymce.init(tabEditor);


var tabEditor2 = {
    language:'zh_TW',
    height:150,
    toolbar_items_size : 'large',
    selector: "textarea.tinymceEditor2",
    menubar:false,
    relative_urls: false,
    plugins: [
        "nonbreaking textcolor colorpicker textpattern fullscreen image link"
    ],
    image_dimensions: false,
    image_class_list: [
        {title: 'Responsive', value: 'img-responsive img-thumbnail'}
    ],
    toolbar: "fontselect fontsizeselect | forecolor backcolor |  bold italic | alignleft aligncenter alignright | image | bullist numlist outdent indent fullscreen | link",
    fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 20pt 24pt 28pt 30pt 34pt 36pt 40pt 42pt 46pt',
    file_browser_callback: function(field_name, url, type, win) {
        if (type == 'image') $('#formUpload input').click();
    },
};
tinymce.init(tabEditor2);

var tabEditor3 = {
    language:'zh_TW',
    height:150,
    toolbar_items_size : 'large',
    selector: "textarea.tinymceEditorCode",
    menubar:false,
    relative_urls: false,
    plugins: [
        "nonbreaking textcolor colorpicker textpattern fullscreen image link code"
    ],
    image_dimensions: false,
    image_class_list: [
        {title: 'Responsive', value: 'img-responsive img-thumbnail'}
    ],
    toolbar: "fontselect fontsizeselect code | forecolor backcolor |  bold italic | alignleft aligncenter alignright | image | bullist numlist outdent indent fullscreen | link",
    fontsize_formats: '8pt 10pt 12pt 14pt 16pt 18pt 20pt 24pt 28pt 30pt 34pt 36pt 40pt 42pt 46pt',
    file_browser_callback: function(field_name, url, type, win) {
        if (type == 'image') $('#formUpload input').click();
    },
};
tinymce.init(tabEditor3);