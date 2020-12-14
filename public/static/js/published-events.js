$(document).ready(function () {
    $.ajax({
      url: "/event/fetch",
      type: "POST",
      //   data:  array_id,
  
  
  
      success: function (response) {
  
  
        var rs = JSON.parse(response);
        // console.log(rs);
        
        var main = rs.response.data;
        // console.log(main);

        
        if (rs.response.data.length == 0) {
            console.log('empty');
        } else {
            $.each(rs.response.data, function (k, v) {
              var date1 =  v.created_on.split(' ');
              console.log(date1[0]);
              rowbody = '<div class="col-xl-3 col-lg-4 col-md-6 py-3"> <div class="card text-center"> <div class="card__body"> <div class="container mt-1 mb-2"> <div class="row"> <span class="btn-xs mr-auto rounded-pill rounded-pill-widget bg-icon-level-up" data-toggle="tooltipWidget" title="" data-original-title=""> <span class="px-1 font-weight-bold">'+date1[0]+'</span> <i class="fas fa-calendar-day"></i> </span> <span class="text-dark"> <span class="px-2 font-weight-bold">Event</span> </span>  </div> </div> <h5 class="publish-title my-3">'+ v.event_title +'</h5> <div style="background-image: url(/public/static/posters/'+ v.poster +'); background-size: cover; width:100%;height:140px;background-position: center top;" class=""></div> <div class="container-fluid"> <div class="row justify-content-center"> <div class="col-md-9"> <a class="btn btn-sm btn-border-b btn-color-link rounded-pill btn-block my-3" href="#">Participate</a> </div> </div> </div> </div> </div> </div>';
            $("#display-event").append(rowbody);
            });
        }
        
        if (response.error) {
          //   console.log(data.error.msg);
  
        } else if (response.success) {
          console.log(response.success.msg);
  
        }
  
      },
      error: function (e) {
        // console.log(response);
  
      }
    });
  });