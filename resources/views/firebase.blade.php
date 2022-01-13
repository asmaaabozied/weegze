@extends('layouts.app')



@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Social Login</div>

                    <div class="card-body">
                        <div id="guestMode">
                            <a class="btn btn-block btn-facebook" onclick="loginWithProvider('facebook');">Facebook Login</a>
                            <a class="btn btn-block btn-google" onclick="loginWithProvider('google');">Google Login</a>
                            <a class="btn btn-block btn btn-app" onclick="loginWithProvider('apple');">Apple Login</a>
                        </div>
                        <div id="authMode">
                            <a class="btn btn-block" onclick="logOutFirebase();" >Logout</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

    <!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>

    <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>

    <!-- Add Firebase products that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script>

    <script>
        // TODO: Replace the following with your app's Firebase project configuration
        // For Firebase JavaScript SDK v7.20.0 and later, `measurementId` is an optional field
        var firebaseConfig = {
            apiKey: "AIzaSyClIZykHlvJJpGAg9Qlx64KelvOIsC5dxQ",
            authDomain: "marvel-megavents.firebaseapp.com",
            databaseURL: "https://marvel-megavents.firebaseio.com",
            projectId: "marvel-megavents",
            storageBucket: "marvel-megavents.appspot.com",
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
    </script>

    <script>
        // function createFakeUser() {
        //     firebase.auth().createUserWithEmailAndPassword("test@mail.com", "123456")
        //         .then((userCredential) => {
        //             // Signed in
        //             var user = userCredential.user;
        //             console.log("USER:: "+JSON.stringify(user))
        //             // ...
        //         })
        //         .catch((error) => {
        //             console.log("ERROR:: "+JSON.stringify(error))
        //             var errorCode = error.code;
        //             var errorMessage = error.message;
        //             // ..
        //         });
        // }

        // function onSignOutClick() {
        //     firebase.auth().signOut();
        // }

        jQuery('document').ready(function($){
            firebase.auth().onAuthStateChanged(function(user) {
                if (user) {
                    // logged in
                    $('#guestMode').hide();
                    $('#authMode').show();
                } else {
                    $('#guestMode').show();
                    $('#authMode').hide();
                }
            });

        });

        function logOutFirebase() {
            firebase.auth().signOut().then(() => {
                // Sign-out successful.
                window.location.href = "{{route('dashboard.logouts')}}";
            }).catch((error) => {
                // An error happened.
            });
        }
        function loginWithProvider(providerName) {
            var provider = null;
            if (providerName === 'google') {
                provider = new firebase.auth.GoogleAuthProvider();
                provider.addScope('https://www.googleapis.com/auth/contacts.readonly');
            } else if (providerName === 'facebook') {
                provider = new firebase.auth.FacebookAuthProvider();
            }  else if (providerName === 'apple') {
                provider = new firebase.auth.OAuthProvider('apple.com');
                provider.addScope('email');
                provider.addScope('name');
            }

            firebase.auth()
                .signInWithPopup(provider)
                .then((result) => {
                    /** @type {firebase.auth.OAuthCredential} */
                    var credential = result.credential;

                    // This gives you a Google Access Token. You can use it to access the Google API.
                    var token = credential.accessToken;
                    // The signed-in user info.
                    var user = result.user;
                    // ...
                    console.log("User::: "+JSON.stringify(user, null, true))
                    console.log("TOKEN::: "+JSON.stringify(token))
                }).catch((error) => {
                console.log("ERROR::: "+JSON.stringify(error))
                // Handle Errors here.
                var errorCode = error.code;
                var errorMessage = error.message;
                // The email of the user's account used.
                var email = error.email;
                // The firebase.auth.AuthCredential type that was used.
                var credential = error.credential;
                // ...
            });
        }
    </script>

@endsection
