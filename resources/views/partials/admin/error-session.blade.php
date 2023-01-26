
@if (session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
@endif
<script>
    document.addEventListener("DOMContentLoaded", function(event) {
          setTimeout(function(){
            document.querySelector(".alert-success").style.display = "none";
          }, 5000);
        });
</script>
