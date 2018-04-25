const rsvpBtn = document.querySelector('.event-heading--rsvp');

rsvpBtn.addEventListener('click', handleRsvpClick);

rsvpAttend = () => {
  const eventId = rsvpBtn.getAttribute('data-event');

  // pass nonce along for user 
  const myHeaders = new Headers({
    'X-WP-Nonce': asAustraliaData.nonce
  });

  fetch(`${asAustraliaData.root_url}/wp-json/asAustralia/v1/manageRsvp`, {
    headers: myHeaders,
    // default fetch doesn't pass cookies along & nonce authentication requires
    credentials: 'same-origin',
    method: 'POST',
    body: JSON.stringify({ 'eventId': eventId })
  })
    .then(function (res) {
      if (res.ok) {
        console.log(res);
        return res.json();
      }
      throw new Error('Network response not ok');
    })
    .then(function (myJson) {
      console.log(myJson);
      rsvpBtn.setAttribute('data-rsvp', 'yes');
      rsvpBtn.innerHTML = 'Attending';
    })
    .catch(function (err) {
      console.log('There has been an error: ', err);
    })
}

rsvpUnattend = () => {
  const eventId = rsvpBtn.getAttribute('data-event');

  fetch(`${asAustraliaData.root_url}/wp-json/asAustralia/v1/manageRsvp`, {
    method: 'DELETE',
    body: { 'eventId': eventId }
  })
    .then(function (res) {
      if (res.ok) {
        return res.json();
      }
      throw new Error('Network response was not ok');
    })
    .then(function (myJson) {
      console.log(myJson);
    })
    .catch(function (err) {
      console.log('There has been an error: ', err.message);
    })
}

function handleRsvpClick() {
  if (this.getAttribute('data-rsvp') === 'yes') {
    rsvpUnattend();
  } else {
    rsvpAttend();
  }
}

