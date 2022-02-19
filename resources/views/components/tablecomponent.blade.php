<section style="padding: 100px">
  <div class="card bg-light shadow p-3 m-5 rounded">
    <div class="card-body">

      <table id="table_id" class="table table-striped table-hover table-bordered rounded">
        <thead>
          <tr>
            <th>E-Mail</th>
            <th>DNI</th>
            <th>Entry</th>
            <th>Exit</th>
            <th>Centre</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($newObject as $new)
            <tr>
              <td>{{ $new->user_email }}</td>
              <td>{{ $new->user_dni }}</td>
              <td>{{ $new->entry_time }}</td>
              <td>{{ $new->exit_time == $new->entry_time ? '-' : $new->exit_time }}</td>
              <td>{{ $new->centre_name }}</td>
            </tr>
          @endforeach
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
