const inputName = document.getElementById('projectNameInput');
const inputShortDes = document.getElementById('projectShortDesInput');
const blockchainLogo = document.getElementById('selectBlockchain');
const twitterNameInput = document.getElementById('twitterNameInput');
const discordNameInput = document.getElementById('discordNameInput');
const websiteLinkInput = document.getElementById('websiteLinkInput');

const log = document.getElementById('projectName');
const log2 = document.getElementById('projectShortDes');
const log3 = document.getElementById('blockchainLogo');
var log4 = document.getElementById('projectImage');
const log5 = document.getElementById('twitterName');
const log6 = document.getElementById('discordName');
const log7 = document.getElementById('websiteName');

inputName.addEventListener('input', updateValue);
inputShortDes.addEventListener('input', updateValue2);
blockchainLogo.addEventListener('input', updateValue3);
twitterNameInput.addEventListener('input', updateValue4);
discordNameInput.addEventListener('input', updateValue5);
websiteLinkInput.addEventListener('input', updateValue6);

function updateValue(e) {
    log.textContent = e.target.value;
}

function updateValue2(e) {
    log2.textContent = e.target.value.substring(0, 60).concat('...');
}

function updateValue3(e) {
   
    var newBlockchainSelect = blockchainLogo.value;

    
    log3.src = '/img/extern_logo/crypto/' +newBlockchainSelect+'.png';

    if(newBlockchainSelect == 'ethereum'){
        document.getElementById('volumeTxt').placeholder = 'Volume traded (ETH)';
    } 
    if(newBlockchainSelect == 'solana'){
        document.getElementById('volumeTxt').placeholder = 'Volume traded (SOL)';
    } 
}

var loadFile = function(event) {
    log4.src = URL.createObjectURL(event.target.files[0]);
    document.getElementById('bannerLabel').innerHTML = inputName.value+' image uploaded';
    log4.onload = function() {
      URL.revokeObjectURL(log4.src); // free memory
    };
  };

function updateValue4(e) {
    document.getElementById('socialBtn').style.display = 'block';
    document.getElementById('twitterLogo').style.visibility = 'visible';
    if(e.target.value === ''){
        document.getElementById('twitterLogo').style.visibility = 'hidden';
    }
    if(e.target.value === '' && log6 === ''){
        document.getElementById('socialBtn').style.display = 'none';
    }
    log5.textContent = e.target.value;
}

function updateValue5(e) {
    document.getElementById('socialBtn').style.display = 'block';
    document.getElementById('discordLogo').style.visibility = 'visible';
    if (e.target.value === '') {
        document.getElementById('discordLogo').style.visibility = 'hidden';
        log6.textContent = '';
    }
    log6.textContent = e.target.value;
    if (e.target.value === '' && log5 === '') {
        document.getElementById('socialBtn').style.display = 'none';
    }
}

function updateValue6(e) {
    document.getElementById('socialBtn').style.display = 'block';
    document.getElementById('websiteLogo').style.visibility = 'visible';
    if(e.target.value === ''){
        document.getElementById('websiteLogo').style.visibility = 'hidden';
        log7.textContent = '';
    }
    if(e.target.value === '' && log5 === '' && log6){
        document.getElementById('socialBtn').style.display = 'none';
    }

    log7.textContent = e.target.value;

    if (log7.textContent.indexOf('https://') > -1)
    {
        log7.textContent = e.target.value.replace("https://", "");
    }
    if (log7.textContent.indexOf('http://') > -1)
    {
        log7.textContent = e.target.value.replace("http://", "");
    }
}