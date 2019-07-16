function result() {
  const email = document.getElementById('email');
  const nick = document.getElementById('nickname');
  const course1 = document.getElementById('course1');
  const course2 = document.getElementById('course2');
  const job = document.getElementById('job');
  const aware = document.getElementById('aware');
  const bg = document.getElementById('code__bg');

  if (email.value === '') {
    document.querySelector('.required__question_email').style.background = 'rgba(252, 232, 230, 1)';
    document.querySelector('.required__question_email .no__input').style.visibility = 'visible';
    document.querySelector('.required__question_email .text__input').style.borderBottom = '1px solid #ea3535';
    alert('please fill in your email');
  } else if (nick.value === '') {
    document.querySelector('.required__question_nick').style.background = 'rgba(252, 232, 230, 1)';
    document.querySelector('.required__question_nick .no__input').style.visibility = 'visible';
    document.querySelector('.required__question_nick .text__input').style.borderBottom = '1px solid #ea3535';
    alert('please fill in your nickname');
  } else if (!course1.checked && !course2.checked) {
    document.querySelector('.required__question_course').style.background = 'rgba(252, 232, 230, 1)';
    document.querySelector('.required__question_course .no__input').style.visibility = 'visible';
    alert('please choose a course');
  } else if (job.value === '') {
    document.querySelector('.required__question_job').style.background = 'rgba(252, 232, 230, 1)';
    document.querySelector('.required__question_job .no__input').style.visibility = 'visible';
    document.querySelector('.required__question_job .text__input').style.borderBottom = '1px solid #ea3535';
    alert('please fill in your current occupation');
  } else if (aware.value === '') {
    document.querySelector('.required__question_aware').style.background = 'rgba(252, 232, 230, 1)';
    document.querySelector('.required__question_aware .no__input').style.visibility = 'visible';
    document.querySelector('.required__question_aware .text__input').style.borderBottom = '1px solid #ea3535';
    alert('please fill in your current occupation');
  } else if (bg.value === '') {
    document.querySelector('.required__question_code__bg').style.background = 'rgba(252, 232, 230, 1)';
    document.querySelector('.required__question_code__bg .no__input').style.visibility = 'visible';
    document.querySelector('.required__question_code__bg .text__input').style.borderBottom = '1px solid #ea3535';
    alert('please fill in your current occupation');
  } else {
    console.log(email.value);
    console.log(nick.value);
    console.log(`course1: ${course1.checked}`);
    console.log(`course2: ${course2.checked}`);
    console.log(job.value);
    console.log(aware.value);
    console.log(bg.value);
    alert('Successfully submitted!');
  }
  return true;
}

document.querySelector('.submit').addEventListener('click', result);
