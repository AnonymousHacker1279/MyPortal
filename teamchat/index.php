<?php
    // Initialize the session
    session_start();

    // Check if the user is logged in, if not then redirect to login page
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header("location: /login/login.php");
        exit;
    }

	$username = $_SESSION['username'];
?>

<!DOCTYPE html>

<html>

<head>

    <script type='text/javascript' src='https://cdn.scaledrone.com/scaledrone.min.js'></script>

    <!--<script type='text/javascript' src='http://0.0.0.0:8080/scaledrone.js'></script>-->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width">

    <style>


        body {
            box-sizing: border-box;
            margin: 0;
            padding: 13px;
            display: flex;
            flex-direction: column;
            max-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
        }



        .members-count,
        .members-list,
        .messages {
            border: 1px solid #e4e4e4;
            padding: 15px;
            margin-bottom: 15px;
        }



        .messages {
            flex-shrink: 1;
            overflow: auto;
        }



        .message {
            padding: 5px 0;
        }

            .message .member {
                display: inline-block;
            }



        .member {
            padding-right: 10px;
            position: relative;
        }



        .message-form {
            display: flex;
            flex-shrink: 0;
        }

        .message-form__input {
            flex-grow: 1;
            border: 1px solid #dfdfdf;
            padding: 10px 15px;
            font-size: 16px;
        }

        .message-form__button {
            margin: 10px;
        }
    </style>

</head>

<body>

    <div class="members-count">-</div>

    <div class="members-list">-</div>

    <div class="messages"></div>

    <form class="message-form" onsubmit="return false;">

        <input class="message-form__input" placeholder="Type a message.." type="text" />

        <input class="message-form__button" value="Send" type="submit" />

    </form>

    <script>
	
	/*

      =====README=====
      You need to create a ScaleDrone account (www.scaledrone.com) and paste an API key in the space below. 
      After you make your account, create a new channel to hold the messages and it will give you a key.

*/

const CLIENT_ID = '';



const drone = new ScaleDrone(CLIENT_ID, {

  data: { // Will be sent out as clientData via events

    name: <?php echo $username; ?>,

    color: getRandomColor(),

  },

});



let members = [];



drone.on('open', error => {

  if (error) {

    return console.error(error);

  }

  console.log('Successfully connected to Scaledrone');



  const room = drone.subscribe('observable-room');

  room.on('open', error => {

    if (error) {

      return console.error(error);

    }

    console.log('Successfully joined room');

  });



  room.on('members', m => {

    members = m;

    updateMembersDOM();

  });



  room.on('member_join', member => {

    members.push(member);

    updateMembersDOM();

  });



  room.on('member_leave', ({id}) => {

    const index = members.findIndex(member => member.id === id);

    members.splice(index, 1);

    updateMembersDOM();

  });



  room.on('data', (text, member) => {

    if (member) {

      addMessageToListDOM(text, member);

    } else {

      // Message is from server

    }

  });

});



drone.on('close', event => {

  console.log('Connection was closed', event);

});



drone.on('error', error => {

  console.error(error);

});



function getRandomColor() {

  return '#' + Math.floor(Math.random() * 0xFFFFFF).toString(16);

}



//------------- DOM STUFF



const DOM = {

  membersCount: document.querySelector('.members-count'),

  membersList: document.querySelector('.members-list'),

  messages: document.querySelector('.messages'),

  input: document.querySelector('.message-form__input'),

  form: document.querySelector('.message-form'),

};



DOM.form.addEventListener('submit', sendMessage);



function sendMessage() {

  const value = DOM.input.value;

  if (value === '') {

    return;

  }

  DOM.input.value = '';

  drone.publish({

    room: 'observable-room',

    message: value,

  });

}



function createMemberElement(member) {

  const { name, color } = member.clientData;

  const el = document.createElement('div');

  el.appendChild(document.createTextNode(name));

  el.className = 'member';

  el.style.color = color;

  return el;

}



function updateMembersDOM() {

  DOM.membersCount.innerText = `${members.length} users in room:`;

  DOM.membersList.innerHTML = '';

  members.forEach(member =>

    DOM.membersList.appendChild(createMemberElement(member))

  );

}



function createMessageElement(text, member) {

  const el = document.createElement('div');

  el.appendChild(createMemberElement(member));

  el.appendChild(document.createTextNode(text));

  el.className = 'message';

  return el;

}



function addMessageToListDOM(text, member) {

  const el = DOM.messages;

  const wasTop = el.scrollTop === el.scrollHeight - el.clientHeight;

  el.appendChild(createMessageElement(text, member));

  if (wasTop) {

    el.scrollTop = el.scrollHeight - el.clientHeight;

  }

}

</body>

</html>