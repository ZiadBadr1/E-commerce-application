@if(session('success'))
    <div class="col-10">
        <div id="successAlert" class="alert alert-success alert-dismissible fade show text-left">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <strong> {{session('success')}}</strong>
        </div>
    </div>
@endif

@if(session('info'))
    <div class="col-10">
        <div id="infoAlert" class="alert alert-info alert-dismissible fade show text-left">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <strong> {{session('info')}}</strong>
        </div>
    </div>
@endif

@if(session('error'))
    <div class="col-10">
        <div id="errorAlert" class="alert alert-danger alert-dismissible fade show text-left">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                    aria-hidden="true">×</span></button>
            <strong> {{session('error')}}</strong>
        </div>
    </div>
@endif

<script>
    // Automatically close the success alert after 5 seconds
    setTimeout(function() {
        $('#successAlert').alert('close');
    }, 3000);
</script>
<script>
    // Automatically close the success alert after 5 seconds
    setTimeout(function() {
        $('#infoAlert').alert('close');
    }, 3000);
</script>
<script>
    // Automatically close the success alert after 5 seconds
    setTimeout(function() {
        $('#errorAlert').alert('close');
    }, 3000);
</script>