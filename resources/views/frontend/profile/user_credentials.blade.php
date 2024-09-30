<div class="card">
          <div class="card-heading">
             <h4>My Profile</h4>
          </div>
          <div class="card-body bio-graph-info">
              <div class="row">
                  <form action="{{ route('front.updateProfile') }}" method="POST" enctype="multipart/form-data" id="profileUpdate">
                      @csrf
                    <div class="mb-3 row">
                        <div class="col-md-6">
                            <label for="staticEmail" class="col-form-label">Image</label>
                            <div class="">
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="staticEmail" class="col-form-label">Name</label>
                            <div class="">
                                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="staticEmail" class="col-form-label">Email</label>
                            <div class="">
                              <input type="text" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="staticEmail" class="col-form-label">Mobile</label>
                            <div class="">
                              <input type="text" class="form-control" name="phone" value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="staticEmail" class="col-form-label">Address</label>
                            <div class="">
                              <textarea class="form-control" name="address">{{ $user->address }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="psw" class="col-form-label">Password</label>
                            <div class="">
                                <input type="password" class="form-control" value="" id="psw" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="psw" class="col-form-label">Confirm Password</label>
                            <div class="">
                                <input type="password" class="form-control" id="psw" value="" name="password_confirmation">
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" style="float: right;margin-top: 20px;background: #b9b9b9;color: #fff;" class="btn ">Update</button>
                        </div>
                    </div>
                </form> 
              </div>
          </div>
      </div>