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
          @foreach ($checks as $check)
            <tr>
              <td>email_placeholder</td>
              <td>dni_placeholder</td>
              <td>{{ $check->entry_time }}</td>
              <td>{{ $check->exit_time == $check->entry_time ? "-" :  $check->exit_time }}</td>
              <td>centres_placeholder</td>
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
