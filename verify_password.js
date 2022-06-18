function checked() {
    if (document.getElementById('pwd').value == document.getElementById('v_pwd').value) {
        document.getElementById('v_pass').style.color = 'green';
        document.getElementById('v_pass').innerHTML = 'Passwords match';
        return true;
    } 
    else {
    document.getElementById('v_pass').style.color = 'red';
    document.getElementById('v_pass').innerHTML = 'Passwords do not match';
    return false;
    }
}