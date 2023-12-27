import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
window.Alpine = Alpine;

Alpine.plugin(focus);

Alpine.start();

// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
import { getMessaging, getToken, onMessage } from "firebase/messaging";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAaPYSltspqBngWp92wW9KbrWqvrvr-Yv0",
  authDomain: "detectpolution.firebaseapp.com",
  projectId: "detectpolution",
  storageBucket: "detectpolution.appspot.com",
  messagingSenderId: "647885513985",
  appId: "1:647885513985:web:d5380c92f7e2016401a700",
  measurementId: "G-1LESX10Y47"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
// const analytics = getAnalytics(app);
const messaging = getMessaging(app);
onMessage(messaging, (payload) => {
    console.log('Message received. ', payload);
    alert('ada notifikasi baru');
  });

getToken(messaging, { vapidKey: 'BOEnEKvZsM9zdu39CUHaqQM-lR4iwtZOLH-JoaPg8tLzRCRBtQJwSGxM8g5xqtD-J6XD0IB45pSMF8y63kPdfos' }).then((currentToken) => {
    if (currentToken) {
      // Send the token to your server and update the UI if necessary
      console.log(currentToken);
    } else {
      // Show permission request UI
      requestPermission();
      console.log('No registration token available. Request permission to generate one.');
      // ...
    }
  }).catch((err) => {
    console.log('An error occurred while retrieving token. ', err);
    // ...
  });

function requestPermission() {
    Notification.requestPermission().then((permission) => {
        if (permission === 'granted') {
          console.log('Notification permission granted.');
          // TODO(developer): Retrieve a registration token for use with FCM.
          // ...
        } else {
          alert(
            "Izinkan notifikasi untuk mendapatkan informaasi"
          );
        }
      });
}
