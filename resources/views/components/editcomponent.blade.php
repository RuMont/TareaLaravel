<!-- FUTURE CONTENT -->

<div class="card m-3 bg-light shadow p-3 m-5 rounded">
    <div class="card-body">

        <table id="table_id" class="table table-striped table-hover table-bordered rounded" style="width:100%">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Entry Time</th>
                    <th>Exit time</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td>{{$d->email}}</td>
                    <td>{{$d->entry_time}}</td>
                    <td>{{$d->exit_time}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
