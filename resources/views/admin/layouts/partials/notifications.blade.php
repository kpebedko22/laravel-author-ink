@props(['errors'])

<script>
    let errors = @json($errors->all());

    notifyErrors(errors);

    function notifyErrors(messages) {
        messages.forEach(msg =>
            $.notify(msg)
        );
    }
</script>
