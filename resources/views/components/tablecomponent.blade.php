<section class="p-5">
  <div class="card bg-light shadow p-3 m-5 rounded">
    <div class="card-body">

      <table id="table_id" class="table table-striped table-hover table-bordered rounded">
        <thead>
          <tr>
            <th>#</th>
            <th>DNI</th>
            <th>Time</th>
            <th>Entry/Exit</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>0</td>
            <td>302934829F</td>
            <td>2038-01-19 03:14:07</td>
            <td>Entry</td>
          </tr>
          {{-- @foreach ($data as $d)
            <tr>
              <td>{{ $d->email }}</td>
              <td>{{ $d->entry_time }}</td>
              <td>{{ $d->exit_time }}</td>
            </tr>
          @endforeach --}}
        </tbody>
      </table>
    </div>
  </div>
</section>
<script>
  $(document).ready(function() {
    $('#table_id').DataTable({
      responsive: true,
      autoWidth: false
    });
  });
</script>
</div>
