<div class="card-body">

    <div class="row">
        <div class="col-12 col-sm-4">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th>Name</th>
                        <td>Basil Robertson</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>Aut deleniti earum i</td>
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td></td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>
                            Image Not Found
                        </td>
                    </tr>
                    <tr>
                        <th>Short Bio</th>
                        <td>Vitae sit modi dist</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-12 col-sm-8">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="custom-tabs-one-messages-tab" data-toggle="pill"
                                href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages"
                                aria-selected="true">Basic Info</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill"
                                href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings"
                                aria-selected="false">Change Password</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade active show" id="custom-tabs-one-messages" role="tabpanel"
                            aria-labelledby="custom-tabs-one-messages-tab">

                            @include($view_path.'includes.basic_info')
                            
                        </div>
                        <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel"
                            aria-labelledby="custom-tabs-one-settings-tab">

                            @include($view_path.'includes.change_password')

                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>

</div>
