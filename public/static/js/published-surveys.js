$(document).ready(function() {
  $.ajax({
    url: '/survey/fetch',
    type: 'POST',
    //   data:  array_id,

    success: function(response) {
      var rs = JSON.parse(response);
      // console.log(rs);

      var main = rs.response.data;
      console.log(main);

      if (rs.response.data.length == 0) {
        rowbody =
            '<tr> <td colspan="3" class="text-center"> No Data to Display  </td> </tr>';

          $('#display-survey').append(rowbody);
      } else {
        $.each(rs.response.data, function(k, v) {
          var date1 = v.created_on.split(' ');
          console.log(date1[0]);
          // rowbody = '<div class="col-md-2 col-sm-4"><a href="/phone_item/'+ v.slug +'"><div class="more-items-img"><img class="mr-2 img-fluid" src="/public/static/phones/'+ v.img +'" width="" alt="Generic placeholder image"></div><div class="custodian-price pb-2"><p class="py-0 p-name">' + v.brand +' '+ v.model +' '+ v.screen_size + '</p><p class="font-weight-bold p-0"><img src="/public/static/assets/logos/egoras-dollar.png" style="width:8px;margin-bottom:4px;margin-right:3px;" class="img-fluid" >' + v.price + '</p></div></a></div>';
          rowbody =
            '<div class="col-xl-3 col-lg-4 col-md-6 py-3"> <div class="card text-center"> <div class="card__body"> <div class="container mt-1 mb-2"> <div class="row"> <span class="btn-xs mr-auto rounded-pill rounded-pill-widget bg-icon-level-up" data-toggle="tooltipWidget" title="" data-original-title=""> <span class="px-1 font-weight-bold">' +
            date1[0] +
            '</span> <i class="fas fa-calendar-day"></i> </span> <span class="text-dark"> <span class="px-2 font-weight-bold">Survey</span> </span>  </div> </div> <h5 id="title-' +
            v.id +
            '" class="publish-title my-3">' +
            v.survey_title +
            '</h5> <div style="background-image: url(/public/static/posters/' +
            v.poster +
            '); background-size: cover; width:100%;height:140px;background-position: center top;" class=""></div> <div class="container-fluid"> <div class="row justify-content-center"> <div class="col-md-9"> <button type=""button class="btn btn-sm btn-border-b btn-color-link rounded-pill btn-block my-3" id="survey-' +
            v.id +
            '" onclick="startSurvey(this.id)" href="#">Participate</button> </div> </div> </div> </div> </div> </div>';
          // rowbody = '<div class="col-xl-3 col-lg-4 col-md-6 py-3"> <div class="card text-center"> <div class="card__body"> <div class="container mt-1 mb-2"> <div class="row"> <span class="btn-xs mr-auto rounded-pill rounded-pill-widget bg-icon-level-up" data-toggle="tooltipWidget" title="" data-original-title=""> <span class="px-1 font-weight-bold">'+date1[0]+'</span> <i class="fas fa-calendar-day"></i> </span> <span class="text-dark"> <span class="px-2 font-weight-bold">Survey</span> </span>  </div> </div> <h5 class="publish-title my-3">'+ v.survey_title +'</h5> <div style="background-image: url(/public/static/posters/'+ v.poster +'); background-size: cover; width:100%;height:140px;background-position: center top;" class=""></div> <div class="container-fluid"> <div class="row justify-content-center"> <div class="col-md-9"> <a class="btn btn-sm btn-border-b btn-color-link rounded-pill btn-block my-3" href="#">Participate</a> </div> </div> </div> </div> </div> </div>';

          rowbody =
            '<tr> <td>' +
            v.survey_title +
            '</td> <td>' +
            date1[0] +
            '</td> <td><a href="/survey/participate/' +
            v.id +
            '" class="btn btn-primary btn-block">Participate</a></td> </tr>';

          $('#display-survey').append(rowbody);
        });
      }

      if (response.error) {
        //   console.log(data.error.msg);
      } else if (response.success) {
        console.log(response.success.msg);
        //   $('#form-div').hide();
        //   $('#success-card').slideDown("slow");
        //   $('#form')[0].reset();
      }
    },
    error: function(e) {
      // console.log(response);
    }
  });
});
