const rsvpBtn = document.querySelector('.event-heading--rsvp');

rsvpBtn.addEventListener('click', handleRsvpClick);


rsvpUnattend = () => {
  // fetch('as-australia.local/wp-json/asAustralia/v1/manageRsvp')
  //   .then(function(res) {

  //   })
  console.log('unattend');
}

rsvpAttend = () => {
  console.log('attend');
}

function handleRsvpClick() {
  if (this.getAttribute('data-rsvp') === 'yes') {
    rsvpUnattend();
  } else {
    rsvpAttend();
  }
}

