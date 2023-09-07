"use strict";

const Web3Modal = window.Web3Modal.default;
const WalletConnectProvider = window.WalletConnectProvider.default;
let web3Modal;

function init() {
    const providerOptions = {
        walletconnect: {
            package: WalletConnectProvider, options: {
                infuraId: "21fb868ed4b5d6d64c361e9d0c49785f",
            }
        }, binancechainwallet: {
            package: true
        }
    };
    web3Modal = new Web3Modal({
        cacheProvider: false, // optional
        providerOptions, // required
        theme: "dark",
    });
}

function closeModal() {
    document.getElementById('wallet-container').style.visibility = 'hidden';
    document.getElementById('backgroundFade').style.visibility = 'hidden';
}

function tijdelijkeWallet() {
    const check = checkFilled();
    if (check === true) {
        document.getElementById('wallet-container').style.visibility = 'visible';
        document.getElementById('backgroundFade').style.visibility = 'visible';
    }
}

function tijdelijkePhantom() {
    if (window.solana && window.solana.isPhantom === true) {
        window.solana.connect();
        window.solana.on("connect", () => phantomW(window.solana.publicKey.toString(), "AtxXMmXcYevxXoSE8CyizSrAGpfBBNbWuXuocoPXuRs1"));
    }
}

window.addEventListener('load', async () => {
    init();
    document.querySelector("#btn-connect").addEventListener("click", tijdelijkeWallet);
});

function metamask() {
    const promotionBox = document.querySelector('input[name="promotionBox"]:checked').value;

    async function onInit() {
        if (window.ethereum && window.ethereum.isMetaMask) {
            console.log('This is MetaMask');
        } else {
            console.log('This is not MetaMask');
        }
        await window.ethereum.enable();
        const accounts = await window.ethereum.request({method: 'eth_requestAccounts'});
        const account = accounts[0];
        if (promotionBox === 'promote') {
            ethereum
                .request({
                    method: 'eth_sendTransaction', params: [{
                        from: account,
                        to: '0x98d1ad5dce66fbf12bdc7add1b60ef536e643f0b',
                        value: '99990000000000',
                        gasLimit: '21000',
                    },],
                })
                .then((txHash) => checkTransaction(txHash))
                .catch((error) => document.getElementById('declinedAlert').style.display = 'flex');
        } else {
            ethereum
                .request({
                    method: 'eth_sendTransaction', params: [{
                        from: account,
                        to: '0x98d1ad5dce66fbf12bdc7add1b60ef536e643f0b',
                        value: '7000000000000', // value: '0',
                        gasLimit: '21000',
                    },],
                })
                .then((txHash) => transactionCheck(txHash))
                .catch((error) => document.getElementById('declinedAlert').style.display = 'flex');
        }
    };onInit();


    document.getElementById('signature').value = txHash;
    document.getElementById('listingForm').submit();

}

async function phantomW(from, to) {
    const promotionBox = document.querySelector('input[name="promotionBox"]:checked').value;

    const network = "https://api.mainnet-beta.solana.com";
    const connection = new solanaWeb3.Connection(network);
    const blockhash = (await connection.getRecentBlockhash("finalized")).blockhash;
    if (promotionBox === 'promote') {
        var instruction = solanaWeb3.SystemProgram.transfer({
            fromPubkey: new solanaWeb3.PublicKey(from), toPubkey: new solanaWeb3.PublicKey(to), lamports: 1200000000
        });
    } else {
        var instruction = solanaWeb3.SystemProgram.transfer({
            fromPubkey: new solanaWeb3.PublicKey(from), toPubkey: new solanaWeb3.PublicKey(to), lamports: 59000000
            // lamports: 0
        });

    }

    const transaction = new solanaWeb3.Transaction({
        recentBlockhash: blockhash, feePayer: new solanaWeb3.PublicKey(from)
    }).add(instruction);
    const transaction2 = new solanaWeb3.Transaction();

    const signedTransaction = await window.solana.signTransaction(transaction);
    const signature = await connection.sendRawTransaction(signedTransaction.serialize());

    if (signature !== '') {
        document.getElementById('signature').value = signature;
        document.getElementById('listingForm').submit();
    }
}

async function formaticW() {
    var promotionBox = document.querySelector('input[name="promotionBox"]:checked').value;
    let fm = new Fortmatic('pk_live_E2527F0F95ABFB6A');
    web3 = new Web3(fm.getProvider());
    if (promotionBox === 'promote') {
        web3.eth.sendTransaction({
            // From address will automatically be replaced by the address of current user
            from: '0x0000000000000000000000000000000000000000',
            to: '0x98d1ad5dce66fbf12bdc7add1b60ef536e643f0b',
            value: '74000000000000000',

        }, (error, txnHash) => {
            if (error) throw error;
            console.log(txnHash);
        });
    } else {
        web3.eth.sendTransaction({
            // From address will automatically be replaced by the address of current user
            from: '0x0000000000000000000000000000000000000000',
            to: '0x98d1ad5dce66fbf12bdc7add1b60ef536e643f0b',
            value: '8000000000000', // value: '0',

        }, (error, txnHash) => {
            if (error) throw error;
            console.log(txnHash);
        });
    }


    document.getElementById('signature').value = txnHash;
    document.getElementById('listingForm').submit();

}


function checkFilled() {
    const requiredFields = ['projectNameInput', 'projectShortDesInput', 'selectBlockchain', 'inputGroupFile01', 'traits', 'roadmap', 'royality', 'supply', 'teamAmount', 'twitterNameInput', 'discordNameInput', 'websiteLinkInput', 'emailContact', 'birthdaytime'];

    for (const field of requiredFields) {
        if (!document.getElementById(field).value) {
            document.getElementById('emptyAlert').style.display = 'flex';
            document.getElementById('emptyAlert').textContent = `The ${field} field is required. Please fill it in.`;
            return false;
        }
    }

    return true;
}