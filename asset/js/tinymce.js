tinymce.init({
    selector: '#tinymce',
    language: "fr_FR",
    plugins: [
        'link image imagetools table fullscreen wordcount help emoticons hr lists media insertdatetime searchreplace charmap nonbreaking anchor'
    ],
    statusbar: false,
    menu: {
        edit: { title: 'edit', items: 'undo redo | cut copy paste | selectall | searchreplace' },
        view: { title: 'view', items: 'visualaid' },
        insert: { title: 'insert', items: 'image link media inserttable | charmap emoticons hr | nonbreaking anchor | insertdatetime' },
        format: { title: 'format', items: 'bold italic underline strikethrough superscript subscript codeformat | formats blockformats fontformats fontsizes align | forecolor backcolor | removeformat' },
        tools: { title: 'tools', items: 'wordcount' },
        table: { title: 'table', items: 'inserttable | cell row column | tableprops deletetable' },
        help: { title: 'help', items: 'help' }
    },
    skin: 'oxide-dark',
    toolbar: 'undo redo |' +
        'styleselect |' +
        'fontselect fontsizeselect bold italic underline |' +
        'forecolor backcolor |' +
        'link image media insertdatetime |' +
        'alignleft aligncenter alignright hr |' +
        'numlist bullist |' +
        'emoticons charmap anchor |' +
        'searchreplace fullscreen',
    fontsize_formats: '11px 12px 14px 16px 18px 24px 36px 48px',
    placeholder: 'Rédige ton texte ici...',
    min_height: 300,
    font_formats: 'Arial=arial,helvetica,sans-serif; Courier New=courier new,courier,monospace;'
});