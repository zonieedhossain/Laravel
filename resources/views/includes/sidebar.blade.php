<div class="col-md-3">
        <table class="table table-bordered">
                <thead class="thead-dark ">
                  <tr>
                    <th scope="col"> Admin Panel</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"> <a href=" {{ url('students') }} ">  Manage Student</a></th>
                  </tr>
                  <tr>
                    <th scope="row"> <a href=" {{ url('teachers') }} "> Manage Teachers</a></th>
                  </tr>
                  {{-- <tr>
                    <th scope="row"> Manage Parents </th>
                  </tr> --}}
                  <tr>
                  <th scope="row"> <a href=" {{ url('departments') }} "> Manage Departments </a></th>
                 </tr>
                 {{-- <tr>
                    <th scope="row"> School Fees</th>
                 </tr> --}}
                 <tr>
                    <th scope="row"> <a href=" {{ url('classes') }} ">Class Schedule</a></th>
                 </tr>
                 <tr>
                    <th scope="row"> <a href=""> Result Publish</a></th>
                 </tr>
                 {{-- <tr>
                     <th scope="row"><a href=""> Reports </a></th> 
                 </tr>  --}}
                </tbody>
              </table>
    </div>