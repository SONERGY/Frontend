App = {
    web3Provider: null,
    type: "generate",
    isEthereum: null,
    coinInfo: null,
    contracts: {},
    account: 0x0,
    price: 0,
    etherscan: "https://etherscan.io/tx/",
    init: function (reload) {

        return App.initWeb3(reload);
    },

    initWeb3: function (reload) {
        if (getCookie("login-type") == "metamask") {
            if (typeof web3 !== "undefined") {
                // Use Mist/MetaMask's provider.
                App.web3Provider = web3.currentProvider;
            } else {
                // Handle the case where the user doesn't have web3. Probably
                // show them a message telling them to install Metamask in
                // order to use the app.
            }
        } else if (getCookie("login-type") == "fortmatic") {
            let fm = new Fortmatic("pk_live_DC2C5F0F76FD816B");
            App.web3Provider = fm.getProvider();
        }
        web3 = new Web3(App.web3Provider);
        web3.currentProvider
            .enable()
            .then(function (accounts) {
                web3.eth.getCoinbase((error, coinbase) => {
                    if (error) throw error;
                    setCookie("walletId", coinbase, 2);
                    App.account = coinbase;
                  
                   $(".ethAddress").html(coinbase);
                    web3.eth.getBalance(coinbase, (error, balance) => {
                        if (error) throw error;
                        var ethBal = web3.utils.fromWei(balance.toString());
                        $(".ethBalance").text(ethBal);
                    });

                   
                    $(".overlay-wallet-connector").hide();
                });
                App.initContract();
                if ($("#walletLogin").hasClass("show")) {
                    $("#walletLoginbtn").trigger("click");
                    $("#loginBtns").show();
                    $("#spinnerLoader").hide();
                   
                    

                }
                // if (reload) {

                //     setTimeout(function () {

                //         location.reload();
                     
                //     }, 1000);
                // }
            })
            .catch(function (reason) {
                // Handle error. Likely the user rejected the login:
                console.log(reason === "User rejected provider access");
            });



    },

    initContract: function () {

     

        $.getJSON('/public/static/json/genericAbi.json?v=0.1.3', function (GenericArtifact) {
            console.log(GenericArtifact.address);
            App.contracts.Sonergy = new web3.eth.Contract(GenericArtifact.abi, GenericArtifact.address);
            App.contracts.Sonergy.setProvider(App.web3Provider);

           
        });

        $.getJSON('/public/static/json/surveyAbi.json?v=0.1.3', function (GenericArtifact) {
            App.contracts.SonergySurvey = new web3.eth.Contract(GenericArtifact.abi, GenericArtifact.address);
            App.contracts.SonergySurvey.setProvider(App.web3Provider);

           
        });

      
    },
    getCoinBalance: function () {


      
    },
    getBalances: function (which) {
        var instance = App.contracts.Sonergy;
        var showOn = ".tokenBalance";
        instance.methods.balanceOf(App.account).call(function (error, price) {
            console.log(error, price);
            if (!error) {
                $(showOn).html(web3.utils.fromWei(price))
            }


        });

    },
    payForSurvey: function(survey_id, duration) {
        var instance = App.contracts.SonergySurvey;

        instance.methods.getPriceOfPlan(duration).call(function (error, price) {
            console.log(error, price);
            if (!error) {
                console.log(web3.utils.fromWei(price));
                App.contracts.Sonergy.methods.allowance(App.account, App.contracts.SonergySurvey._address).call(function (error, allowance) {
                    console.log(error, allowance);
                    if (parseFloat(allowance) >= parseFloat(price)) {
                        // proceed to make payment
                        instance.methods.payForSurvey(survey_id, duration).send({
                            from: App.account
                        })
                        .on('transactionHash', function (hash) {
                            if (hash !== null) {
                                var text = '<p>Completed successfully <br><b><a target="_blank" href="' + App.etherscan + hash + '">Click here to see transaction status</a></b>. Thank you for using egoras.</p>';
                                //App.alerterSuccesss(text);
                                console.log(hash);
                            }
                        }).on('error', function (err) {
                            var text = '<p>Did not complete successfully </p>';
                            //App.alerterDanger(text);
                            console.log(err);
                        })

                    }else{
                        $(".cartInfo").addClass("dontShow");
                        $(".unlockWallet").removeClass("dontShow");
                        // show unlock view

                        
                    }
                
                
                });

            }else{
                //error of invalid survey plan
            }


        });
    }


   
}





$(window).on("load", function () {
    if (checkCookie("login-type")) {
      
        App.init(false);

    }

});


function approveBtnTrigger() {
    $("#openApproveModal").trigger("click");
    $("#txtModal").removeClass("show");
}

function connectWallet() {
 
    $("#walletLoginbtn").trigger("click");
}






function formatNumber(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
}

function enableWalletProvider(id) {
    $("#loginBtns").hide();
    $("#spinnerLoader").show();

    setCookie("login-type", id, 2);
    App.init(false);
}

function enableWalletProviderFromModal(id) {
    $("#loginBtns").hide();
    $("#spinnerLoader").show();

    setCookie("login-type", id, 2);
    App.init(true);
}
function approveApp() {
    let approveAddress = $("#approveContractAddress").val();
    let callingAddress = $("#callingContractAddress").val();
    let approvalAmount = $("#approvalAmount").val();
    App.approveApp(callingAddress, approveAddress, approvalAmount);

}




function getPrice() {
    App.getBalances(1);

}

$(document).ready(function () {
    setTimeout(getPrice, 5000);

});

$("#egrInput").keyup(function () {
    let tokenPrice = localStorage.tokenPrice;
    $("#etherInput").val(parseFloat($("#egrInput").val()) * parseFloat(tokenPrice));
    ///alert(tokenPrice);
});

$("#etherInput").keyup(function () {
    let tokenPrice = localStorage.tokenPrice;
    $("#egrInput").val(parseFloat($("#etherInput").val()) / parseFloat(tokenPrice));
    ///alert(tokenPrice);
});



$("#receiveTradeAmount").keyup(function () {
    let amount = parseFloat($(this).val());
    if (isNaN(amount)) {
        $(this).val("");

    } else {
        if (App.type == "redem") {
            let sendAmount = amount * parseFloat(App.price);
            $("#sendTradeAmount").val(sendAmount);
        } else {
            let sendAmount = amount / parseFloat(App.price);
            $("#sendTradeAmount").val(sendAmount);
        }

    }

});

$("#sendTradeAmount").keyup(function () {

    let amount = parseFloat($(this).val());

    if (isNaN(amount)) {
        $(this).val("");

    } else {
        if (App.type == "redem") {
            let sendAmount = amount / parseFloat(App.price);
            $("#receiveTradeAmount").val(sendAmount);
        } else {

            let sendAmount = amount * parseFloat(App.price);
            $("#receiveTradeAmount").val(sendAmount);
        }

    }
});