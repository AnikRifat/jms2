@extends('web.app.app')


@section('main-body')
<div class="main-body">
    <section class="form-page">
        <div class="form-page__img bg-dark-1">
          <div class="form-page-composition">
            <div class="-bg"><img data-move="30" class="js-mouse-move" src="img/login/bg.png" alt="bg"></div>
            <div class="-el-1"><img data-move="20" class="js-mouse-move" src="img/home-9/hero/bg.png" alt="image"></div>
            <div class="-el-2"><img data-move="40" class="js-mouse-move" src="img/home-9/hero/1.png" alt="icon"></div>
            <div class="-el-3"><img data-move="40" class="js-mouse-move" src="img/home-9/hero/2.png" alt="icon"></div>
            <div class="-el-4"><img data-move="40" class="js-mouse-move" src="img/home-9/hero/3.png" alt="icon"></div>
          </div>
        </div>

        <div class="form-page__content lg:py-50">
          <div class="container">
            <div class="row justify-center items-center">
              <div class="col-xl-8 col-lg-9">
                <div class="px-50 py-50 md:px-25 md:py-25 bg-white shadow-1 rounded-16">
                  <h3 class="text-30 lh-13">Sign Up</h3>
                  <p class="mt-10">Already have an account? <a href="login.html" class="text-purple-1">Log in</a></p>

                  <form class="contact-form respondForm__form row y-gap-20 pt-30" action="#">
                    <div class="col-lg-6">
                      <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Email address *</label>
                      <input type="email" name="email" placeholder="Name">
                    </div>
                    <div class="col-lg-6">
                        <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Phone Number *</label>
                        <input type="phone" name="phone" placeholder="Name">
                      </div>
                    <div class="col-lg-6">
                      <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Username *</label>
                      <input type="text" name="name" placeholder="Name">
                    </div>
                    <div class="col-lg-6">
                      <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Password *</label>
                      <input type="text" name="password" placeholder="Name">
                    </div>
                    <div class="col-lg-6">
                      <label class="text-16 lh-1 fw-500 text-dark-1 mb-10">Confirm Password *</label>
                      <input type="text" name="confirm-password" placeholder="Name">
                    </div>
                    <div class="col-12">
                      <button type="submit" name="submit" id="submit" class="button -md -green-1 text-dark-1 fw-500 w-1/1">
                        Register
                      </button>
                    </div>
                  </form>

                  <div class="lh-12 text-dark-1 fw-500 text-center mt-20">Or sign in using</div>

                  <div class="d-flex x-gap-20 items-center justify-between pt-20">
                    <div><button class="button -sm px-24 py-20 -outline-blue-3 text-blue-3 text-14">Log In via Facebook</button></div>
                    <div><button class="button -sm px-24 py-20 -outline-red-3 text-red-3 text-14">Log In via Google+</button></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>



<!-- blog breadcrumb version one strat here -->
</div>

@endsection
