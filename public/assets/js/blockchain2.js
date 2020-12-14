App2 = {
    web3Provider: null,
    type: "generate",
    isEthereum: null,
    coinInfo: null,
    contracts: {},
    account: 0x0,
    price: 0,
    etherscan: "https://etherscan.io/tx/",
    init: function (reload) {

        return App2.initWeb3(reload);
    },

    initWeb3: function (reload) {
        if (getCookie("login-type") == "metamask") {
            if (typeof web3 !== "undefined") {
                // Use Mist/MetaMask's provider.
                App2.web3Provider = web3.currentProvider;
            } else {
                // Handle the case where the user doesn't have web3. Probably
                // show them a message telling them to install Metamask in
                // order to use the App2.
            }
        } else if (getCookie("login-type") == "fortmatic") {
            let fm = new Fortmatic("pk_live_DC2C5F0F76FD816B");
            App2.web3Provider = fm.getProvider();
        }
        web3 = new Web3(App2.web3Provider);
        web3.currentProvider
            .enable()
            .then(function (accounts) {
                web3.eth.getCoinbase((error, coinbase) => {
                    if (error) throw error;
                    setCookie("walletId", coinbase, 2);
                    App2.account = coinbase;
                  
                   $(".ethAddress").html(coinbase);
                    web3.eth.getBalance(coinbase, (error, balance) => {
                        if (error) throw error;
                        var ethBal = web3.utils.fromWei(balance.toString());
                        $(".ethBalance").text(ethBal);
                    });

                   
                    $(".overlay-wallet-connector").hide();
                });
                App2.initContract();
                 $(".connectWalletDiv").addClass("dontShow");
                 $(".cartInfo").removeClass("dontShow");
                 $("#loginBtns2").show();
                 $("#spinnerLoader2").hide();
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

     

        $.getJSON('/public/static/json/genericAbi.json?v=0.1.5', function (GenericArtifact) {
            console.log(GenericArtifact.address);
            App2.contracts.Sonergy = new web3.eth.Contract(GenericArtifact.abi, GenericArtifact.address);
            App2.contracts.Sonergy.setProvider(App2.web3Provider);

           
        });

        $.getJSON('/public/static/json/surveyAbi.json?v=0.1.5', function (GenericArtifact) {
            App2.contracts.SonergySurvey = new web3.eth.Contract(GenericArtifact.abi, GenericArtifact.address);
            App2.contracts.SonergySurvey.setProvider(App2.web3Provider);

           
        });

      
    },
    getCoinBalance: function () {


      
    },
    getBalances: function (which) {
        var instance = App2.contracts.Sonergy;
        var showOn = ".tokenBalance";
        instance.methods.balanceOf(App2.account).call(function (error, price) {
            console.log(error, price);
            if (!error) {
                $(showOn).html(web3.utils.fromWei(price))
            }


        });

    },
    appoveSonergy: function(){
        $(".paymentLoader").removeClass("dontShow");
        $(".unlockWallet").addClass("dontShow");
        let tax = parseFloat(localStorage.getItem("tax"));
        let amount = parseFloat(localStorage.getItem("amount"));
    
        let fee = (tax / 100) * amount + amount * 2;
        App2.contracts.Sonergy.methods.approve(App2.contracts.SonergySurvey._address, web3.utils.toWei(fee.toString())).send({
            from: App2.account
        })
            .on('transactionHash', function (hash) {
                if (hash !== null) {
                  
            }
            })
            .on('confirmation', function(number, receipt) {
                console.log(number);
               if(parseInt(number) > 0){
                $(".paymentLoader").addClass("dontShow");
                $(".cartInfo").removeClass("dontShow");
               }
            }).on('error', function (err) {
                $(".paymentLoader").addClass("dontShow");
        $(".unlockWallet").removeClass("dontShow");

            })

    },
    payForSurvey: function(survey_id, duration) {
        $(".paymentLoader").removeClass("dontShow");
        $(".cartInfo").addClass("dontShow");
        var instance = App2.contracts.SonergySurvey;

        instance.methods.getPriceOfPlan(duration).call(function (error, price) {
            console.log(error, price, "The allowance Error");
            if (!error) {
                console.log();
                App2.contracts.Sonergy.methods.allowance(App2.account, instance._address).call(function (error, allowance) {
                    console.log(error, allowance, "The allowance");
                    setTimeout(function(){
                        if (parseFloat(allowance) >= parseFloat(price)) {
                            // proceed to make payment
                            instance.methods.payForSurvey(survey_id, duration).send({
                                from: App2.account
                            })
                            .on('transactionHash', function (hash) {
                                if (hash !== null) {
                                    var text = '<p>Completed successfully <br><b><a class="btn-style-b-m active" target="_blank" href="' + App2.etherscan + hash + '">Click here to see transaction status</a></b><br>. Thank you for using Sonergy.</p>';
                                    //App2.alerterSuccesss(text);
                                    // console.log(text);
                                    $(".SUk").html(text)
                                    $(".paymentLoader").addClass("dontShow");
                                    $(".successDivContainer").removeClass("dontShow");
                                    $(".cartInfo").addClass("dontShow");
                                }
                            }).on('error', function (err) {
                                // var text = '<p>Did not complete successfully </p>';
                                //App2.alerterDanger(text);
                                
                                $(".cartInfo").removeClass("dontShow");
                                $(".paymentLoader").addClass("dontShow");
                                $(".successDivContainer").addClass("dontShow");
                                console.log(err);
                            })
    
                        }else{
                            $(".cartInfo").addClass("dontShow");
                            $(".paymentLoader").addClass("dontShow");
                            $(".unlockWallet").removeClass("dontShow");
                            // show unlock view
    
                            
                        }
                     }, 900);
                    
                
                
                });

            }else{
                //error of invalid survey plan
            }


        });
    }


   
}





$(window).on("load", function () {
    if (checkCookie("login-type")) {
      
        App2.init(false);

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
    $("#loginBtns2").hide();
    $("#spinnerLoader").show();
    $("#spinnerLoader2").show();

    setCookie("login-type", id, 2);
    App2.init(false);
}

function enableWalletProviderFromModal(id) {
    $("#loginBtns").hide();
    $("#spinnerLoader").show();

    setCookie("login-type", id, 2);
    App2.init(true);
}
function approveApp() {
    let approveAddress = $("#approveContractAddress").val();
    let callingAddress = $("#callingContractAddress").val();
    let approvalAmount = $("#approvalAmount").val();
    App2.approveApp(callingAddress, approveAddress, approvalAmount);

}




function getPrice() {
    App2.getBalances(1);

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
        if (App2.type == "redem") {
            let sendAmount = amount * parseFloat(App2.price);
            $("#sendTradeAmount").val(sendAmount);
        } else {
            let sendAmount = amount / parseFloat(App2.price);
            $("#sendTradeAmount").val(sendAmount);
        }

    }

});

$(".navigate").click(function () {
    console.log(this.id);
    $("#"+this.id).trigger("click")
});


$("#sendTradeAmount").keyup(function () {

    let amount = parseFloat($(this).val());

    if (isNaN(amount)) {
        $(this).val("");

    } else {
        if (App2.type == "redem") {
            let sendAmount = amount / parseFloat(App2.price);
            $("#receiveTradeAmount").val(sendAmount);
        } else {

            let sendAmount = amount * parseFloat(App2.price);
            $("#receiveTradeAmount").val(sendAmount);
        }

    }
});