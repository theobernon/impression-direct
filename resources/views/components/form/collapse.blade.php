<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">{{$title}}</h3>
        <div class="card-tools">
            <!-- Collapse Button -->
            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
        </div>
        <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body danger">
        {{$slot}}
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->
