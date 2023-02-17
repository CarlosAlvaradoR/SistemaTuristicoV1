<script>
    window.addEventListener('swal', event => {
        Swal.fire({
            icon: event.detail.icon,
            title: event.detail.title,
            text: event.detail.text,
            //footer: '<a href="">Why do I have this issue?</a>'
        });
        
    });
</script>
