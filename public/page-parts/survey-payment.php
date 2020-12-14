<style>
    #makepublish {
        display: none;
    }
</style>

<div class="row">
    <div class="col-md-12">

        <!-- Uploaded image area-->
        <!-- <h4 class="text-center">Event Poster</h4> -->
     <div class="cartInfo dontShow">
     <div class="col-xl-12">
                                    <div class="ico-distribution-wrapper">
                                        <h2 class="crypto-stitle">Survey summary</h2>
                                        <div class="ico-distribution-box">
                                            <div class="idb-head">
                                                <p>Duration</p>
                                                <h4 class="text-right"><span id="durationt"></span> Days</h4>
                                            </div>

                                            <div class="idb-head">
                                                <p>Subtotal</p>
                                                <h4 class="text-right"><b><span id="amountt">0</span> <small>SNGY</small></b></h4>
                                                <p>Tax</p>
                                                <h4 class="text-right"><span id="taxt">0</span>%</h4>
                                                <p>Total</p>
                                                <h4 class="text-right"><b><span id="grandTotalt">0</span> <small>SNGY</small></b></h4>
                                            
                                            </div>
                                            <br>
                                            <button type="button" id="btn-preview" class="navigate btn btn-warning  rounded-pill shadow-sm"> <i class="fa fa-arrow-left"></i> Previous </button>

                                            <button type="button" class="btn btn-success" onclick="pay()">Make Payment</button>
                                        </div>

                                       
                                        
                                    </div>
                                </div>
     </div>
    <div class="unlockWallet text-center dontShow">
    <h1 class="text-warning"><i class="fa fa-unlock"></i></h1>
    <h2 class="crypto-stitle">Unlock Funds</h2>
    <p>Give <b>Sonergy</b> access to spend your token on behalf of you.</p>
    <button type="button" name="updatePassword" class="cfi-button" onclick="unluckFund()">Unlock</button>
     </div>

     <div class="successDivContainer text-center dontShow">
    <h1 class="text-success"><i class="fa fa-check"></i></h1>
    <h2 class="crypto-stitle">Success</h2>
   <div class="SUk"></div>
    <a href="/account" class="cfi-button">Continue</a>
     </div>


     <div class="paymentLoader dontShow text-center">
        <div class="text-center">
          <img class="img-fluid " width="" src="/public/assets/img/loader.gif" alt="">
          <p><b>Initializing, please wait...</b></p>
        </div>
     </div>

     <div class="row connectWalletDiv">
          <div class="col-md-12">
          <div class=" text-center" id="spinnerLoader2" style="display: none;">
          <img class="img-fluid " width="" src="/public/assets/img/loader.gif" alt="">
          <p><b>Initializing, please wait...</b></p>
          </div>
              <div class="row" id="loginBtns2">
              <div class="col-md-6 text-center">
              <h4><img class="img-fluid mr-1" width="15" src="/public/assets/img/metamask.png" alt=""> <span>MetaMask</span></h4>
                <p>Connect to the MetaMask Chrome extension</p>
              <button type="button" id="metamask" onclick="enableWalletProvider(this.id)" class="btn-primary  btn btn-block mt-3">Connect</button>
              </div>
              <div class="col-md-6 text-center">
                <h4><img class="img-fluid mr-1" width="15" src="/public/assets/img/fortmatic.png" alt=""><span> Fortmatic</span></h4>
                <p>Connect your wallet using phone number</p>

                <button type="button" id="fortmatic" onclick="enableWalletProvider(this.id)" class="btn btn-primary  btn-block mt-3">Connect</button>
              </div>
              
            </div>
          </div>

        </div>
    </div>
</div>
<script>
    function trigaPublish(id) {
        App.setStep("4");
    }

    function unluckFund(){
        App2.appoveSonergy();
    }
    function pay() {
       
     App2.payForSurvey(localStorage.getItem("id"), localStorage.getItem("duration"));
    }
    setInterval(function(){ 
            
            let duration = parseFloat(localStorage.getItem("duration"));
    let tax = parseFloat(localStorage.getItem("tax"));
    let amount = parseFloat(localStorage.getItem("amount"));

    let fee = (tax / 100) * amount + amount;
   
    $("#grandTotalt").html(fee);
    $("#taxt").html(tax);
    $("#amountt").html(amount);
    $("#durationt").html(localStorage.getItem("duration"));
    

         }, 300);
</script>

<!-- <script src="https://js.paystack.co/v1/inline.js"></script>  -->
