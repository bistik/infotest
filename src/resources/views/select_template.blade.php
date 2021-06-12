<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Test</title>

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    </head>
    <body>
        <div id="container">
            <h1 style="margin: 1em 0">Test</h1>
            <form method="post" action="{{ route('pdf') }}">
                @csrf
                <input type="hidden" name="template_id" value="{{ $template->id }}">
                <textarea id="summernote" name="template"></textarea>
                <div style="margin: 1em 0">
                    <input type="text" name="name" placeholder="Name"><br>
                    <input type="text" name="owner_name" placeholder="Owner name"><br>
                    <input type="text" name="owner_jobtitle" placeholder="Owner Job title"><br>
                    <input type="text" name="approver_name" placeholder="Approver name"><br>
                    <input type="text" name="approver_jobtitle" placeholder="Approver Job Title"><br>
                    <input type="text" name="reviewer_name" placeholder="Reviewer name"><br>
                    <input type="text" name="reviewer_jobtitle" placeholder="Reviewer Job title"><br>
                    <input type="text" name="interval" placeholder="Interval"><br>
                    <input type="text" name="audience" placeholder="Audience">
                </div>
                <div style="margin: 1em 0"><button type="submit">Generate PDF</button><div>
            </form>
        </div>

        <script>
            window.template = {};
            window.template.content = {!! json_encode($template->template) !!};
            $('#summernote').summernote({
                tabsize: 2,
                height: 500,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            var testContent = '<h1>hi there</h1><p>test</p>';
            $('#summernote').summernote('code', window.template.content);
        </script>
    </body>
</html>
