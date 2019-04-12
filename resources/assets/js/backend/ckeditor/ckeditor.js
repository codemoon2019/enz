const token = $('meta[name="csrf-token"]').attr('content')
CKEDITOR.config.extraAllowedContent = '*(*);*{*}';
CKEDITOR.disableAutoInline = true;

const options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + token,
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + token,
    height:'200px',
    allowedExtensions: 'png'
}
const options_simple = {
    toolbar: [
        { name: 'clipboard', items: [ 'Undo', 'Redo' ] },
        { name: 'styles', items: [ 'Styles', 'Format' ] },
        { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
        { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
        { name: 'links', items: [ 'Link', 'Unlink' ] },
        { name: 'insert', items: [ 'Table', 'Embed' ] },
        { name: 'tools', items: [ 'Maximize' ] },
        { name: 'editing', items: [ 'Scayt' ] }
    ],
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + token,
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + token,
    height:'200px',
    allowedExtensions: 'png',
    embed_provider: '//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}',
}
$(document).ready(function () {
	$('.form-ckeditor').each(function () {
		if ($(this).attr('id')) {
			CKEDITOR.replace($(this).attr('id'), options)
		}
	})
	$('.form-ckeditor-simple').each(function () {
		if ($(this).attr('id')) {
			CKEDITOR.replace($(this).attr('id'), options_simple)
		}
	})
})