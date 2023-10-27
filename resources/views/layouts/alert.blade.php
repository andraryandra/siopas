<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        <p>{{ $message }}</p>
    </div>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert-success').fadeOut();
            }, 4000);
        });
    </script>
@endif

@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        <p>{{ $message }}</p>
    </div>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert-danger').fadeOut();
            }, 4000);
        });
    </script>
@endif
