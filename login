<!DOCTYPE html>
<html lang="en">
<head>
    <div class="video-background">
        <div class="video-wrap">
            <div id="video">
                
                <video id="bgvid" src="C:\Users\artha\OneDrive\Desktop\MyWeb\accessories\videoplayback.mp4" type="video/mp4" autoplay loop muted></video>
            </div>
        </div>
    </div>
    </head>
    <body>
    
        <div class="hero">
            <div class="form-box">
                <div class="button-box">
                    <div class="btn"></div>
                    <button type="button" class="toggle-btn" onclick="login()">Log In</button> 
                    <button type="button" class="toggle-btn" onclick="register()">Register</button>
                </div>
                <div class="social-icons">
                    <img src="https://i.pinimg.com/originals/9b/e7/a0/9be7a031fcd2215a8827ae719d546182.jpg" href="https://www.facebook.com/">
                    <img src="https://image.similarpng.com/very-thumbnail/2020/06/Black-icon-Twitter-logo-transparent-PNG.png" href="https://twitter.com">
                    <img src="https://img.favpng.com/14/10/12/icon-design-computer-icons-google-logo-png-favpng-8i3PpW05rd2kx28CBUz3btd73.jpg" href="https://google.com">
                </div>
                <form id="login" class="input-group">
                    <input type="text" class="input-field" placeholder="Username" required="">
                    <input type="password" class="input-field" placeholder="Password" required="">
                    <input type="checkbox" class="checkbox"><span> Remember Password</span>
                    <button type="submit" class="submit-btn">Log In</button>
                    </form>
                    <form id="register" class="input-group">
                        <input type="text" class="input-field" placeholder="Username" required="">
                        <input type="email" class="input-field" placeholder="E-mail" required="">
                        <input type="password" class="input-field" placeholder="Password" required="">
                        <input type="checkbox" class="checkbox" required=""><span> I agree to the terms & conditions.</span>
                        <button type="submit" class="submit-btn">Register</button>
                        </form>
            </div>