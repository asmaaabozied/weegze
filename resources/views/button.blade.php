<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>button</title>
</head>
<body>

<h3>Social Login </h3>

<br>
<a class="btn-danger" href="{{route('login.social', ['provider' => 'facebook'])}}"> Facebook</a>

<br>
<br>
<a class="btn-danger" href="{{route('login.social', ['provider' => 'google'])}}"> Google</a>

{{--<form>--}}
{{--    <br>--}}
{{--    <a class="btn-danger" onclick="socialSignin('facebook');"> Facebook</a>--}}

{{--    <br>--}}
{{--    <a class="btn btn-default" onclick="socialSignin('google');"> Google </a>--}}
{{--</form>--}}

{{--<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->--}}
{{--<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>--}}

{{--<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->--}}
{{--<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>--}}

{{--<!-- Add Firebase products that you want to use -->--}}
{{--<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>--}}
{{--<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script>--}}

{{--<script>--}}
{{--    // TODO: Replace the following with your app's Firebase project configuration--}}
{{--    // For Firebase JavaScript SDK v7.20.0 and later, `measurementId` is an optional field--}}
{{--    var firebaseConfig = {--}}
{{--        apiKey: "AIzaSyCPkmyONGDBIq7vKC7xq5z-dbLI9Q-8HG4\n",--}}
{{--        authDomain: "asmfirephp.firebaseapp.com",--}}
{{--        databaseURL: "https://asmfirephp.firebaseio.com",--}}
{{--        projectId: "asmfirephp",--}}
{{--    };--}}

{{--    // Initialize Firebase--}}
{{--    firebase.initializeApp(firebaseConfig);--}}
{{--    var facebookProvider = new firebase.auth.FacebookAuthProvider();--}}
{{--    var googleProvider = new firebase.auth.GoogleAuthProvider();--}}
{{--    var facebookCallbackLink = '/login/facebook/callback';--}}
{{--    var googleCallbackLink = '/login/google/callback';--}}

{{--    async function socialSignin(provider) {--}}
{{--        console.log("Start 1")--}}
{{--        var socialProvider = null;--}}
{{--        if (provider == "facebook") {--}}
{{--            socialProvider = facebookProvider;--}}
{{--            document.getElementById('social-login-form').action = facebookCallbackLink;--}}
{{--        } else if (provider == "google") {--}}
{{--            socialProvider = googleProvider;--}}
{{--            document.getElementById('social-login-form').action = googleCallbackLink;--}}
{{--        } else {--}}
{{--            return;--}}
{{--        }--}}
{{--        console.log("Start "+socialProvider)--}}
{{--        firebase.auth().signInWithPopup(socialProvider).then(function(result) {--}}
{{--            console.log("signInWithPopup: "+result)--}}
{{--            result.user.getIdToken().then(function(result) {--}}
{{--                console.log("TOKEN: "+result);--}}
{{--                document.getElementById('social-login-tokenId').value = result;--}}
{{--                document.getElementById('social-login-form').submit();--}}
{{--            });--}}
{{--        }).catch(function(error) {--}}
{{--            // do error handling--}}
{{--            console.log("Error: "+error);--}}
{{--        });--}}
{{--    }--}}
{{--</script>--}}

</body>
</html>
