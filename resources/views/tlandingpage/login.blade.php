<x-guest-layout>
        <div class="wpo-login-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <form class="wpo-accountWrapper" action="#">
                            <div class="wpo-accountInfo">
                                {{-- <div class="wpo-accountInfoHeader">
                                    <a href="#"><img src="{{asset('tlandingpage/assets/images/logo2.png')}}" alt="" height="50px"></a>
                                </div>
                                <div class="image">
                                    <img src="{{asset('tlandingpage/assets/images/login.svg')}}" alt="">
                                </div> --}}
                            </div>
                            <div class="wpo-accountForm form-style">
                                <div class="text-center">
                                    <img src="{{asset("tlandingpage/assets/images/logo2.png")}}" alt="" width="250px">
                                    <br>
                                    <br>
                                    <div class="fromTitle">
                                        <h2>Login</h2>
                                        <p>Sign into your pages account</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <label>Email</label>
                                        <input type="text" id="email" name="email" placeholder="demo@gmail.com">
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input class="pwd6" type="password" placeholder="" value="123456"
                                                name="pass">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default reveal6" type="button"><i
                                                        class="ti-eye"></i></button>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-12">
                                        <button type="submit" class="wpo-accountBtn">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </x-guest-layout>
