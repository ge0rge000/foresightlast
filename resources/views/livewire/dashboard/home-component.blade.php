<div>

    <div class="row">
        <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info">{{$compaines}}</h3>
                      <h6>عدد شركات</h6>
                    </div>
                    <div>
                      <i class="las la-building info font-large-2 float-right"></i>

                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info">{{$contactpersons}}</h3>
                      <h6> اشخاص تابعين لشركات</h6>
                    </div>
                    <div>
                      <i class="las la-users info font-large-2 float-right"></i>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="info">{{$totalfollowing}}</h3>
                      <h6> عدد المتابعات  </h6>
                    </div>
                    <div>
                      <i class="las la-angle-double-right info font-large-2 float-right"></i>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up" style="cursor: pointer;" onclick="window.location='{{ route('todaysfollowing') }}'">
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info">{{ $todayFollowingCount }}</h3>
                                <h6>متابعات اليوم</h6>
                            </div>
                            <div>
                                <i class="las la-angle-double-left info font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up" style="cursor: pointer;" >
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info">{{ $visitFollowingCount }}</h3>
                                <h6>  عدد متابعات عن طريق الزياره خلال الشهر</h6>
                            </div>
                            <div>

                                <i class="las la-walking success font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up" style="cursor: pointer;" >
                <div class="card-content">
                    <div class="card-body">
                        <div class="media d-flex">
                            <div class="media-body text-left">
                                <h3 class="info">{{ $callFollowingCount }}</h3>
                                <h6> عدد متابعات عن طريق الانصال خلال الشهر</h6>
                            </div>
                            <div>
                                <i class="las la-phone-volume info font-large-2 float-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-4 col-lg-6 col-12">
          <div class="card pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="info">{{$recieveOrder}}</h3>
                    <h6>الاوردرات</h6>
                  </div>
                  <div>
                    <i class="las la-arrows-alt info font-large-2 float-right"></i>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
          <div class="card pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="warning">{{$recieveOrderwithrecieve}}</h3>
                    <h6>الاوردرات التي تحت تنفيذ</h6>
                  </div>
                  <div>
                    <i class="las la-running warning font-large-2 float-right"></i>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
          <div class="card pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="success">{{$recieveOrderwithdeliver}}</h3>
                    <h6>الاوردرات التي تم تسليمها</h6>
                  </div>
                  <div>
                    <i class="las la-user-check success font-large-2 float-right"></i>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
          <div class="card pull-up">
            <div class="card-content">
              <div class="card-body">
                <div class="media d-flex">
                  <div class="media-body text-left">
                    <h3 class="danger">{{$recieveOrderwithguarantee}}</h3>
                    <h6>اوردرات بضمان</h6>
                  </div>
                  <div>
                    <i class=" las la-smile info font-large-2 float-right"></i>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-12">
            <div class="card pull-up">
              <div class="card-content">
                <div class="card-body">
                  <div class="media d-flex">
                    <div class="media-body text-left">
                      <h3 class="danger">{{$recieveOrderwithnonguarantee}}</h3>
                      <h6>اوردرات بدون بضمان</h6>
                    </div>
                    <div>
                      <i class="las la-meh danger font-large-2 float-right"></i>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
      </div>



      @if($highRecordsCount!=null)
      <div class="card">
        <div class="card-header">
          <h4 class="card-title text-center"> أعلي موظف متابعه مع العملاء خلال هذا الشهر</h4>
        </div>

        <div class="card-content collapse show">
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-md-6 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                <h6 class="danger text-bold-600">الاسم</h6>
                <h4 class="font-large-1 text-bold-400">{{$highRecordsCount->user->name}}</h4>
              </div>
              <div class="col-md-6 col-12 text-center">
                <h6 class="success text-bold-600">عدد العملاء </h6>
                <h4 class="font-large-1 text-bold-400">{{$highRecordsCount->total}}</h4>
              </div>
            </div>
          </div>
        </div>

      </div>
      @endif
      @if($lowRecordsCount!=null)
      <div class="card">
        <div class="card-header">
          <h4 class="card-title text-center"> اقل موظف متابعه مع العملاء خلال هذا الشهر</h4>
        </div>

        <div class="card-content collapse show">
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-md-6 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                <h6 class="danger text-bold-600">الاسم</h6>
                <h4 class="font-large-1 text-bold-400">{{$lowRecordsCount->user->name}}</h4>
              </div>
              <div class="col-md-6 col-12 text-center">
                <h6 class="success text-bold-600">عدد العملاء </h6>
                <h4 class="font-large-1 text-bold-400">{{$lowRecordsCount->total}}</h4>
              </div>
            </div>
          </div>
        </div>

      </div>
      @endif
      @if($highestRecordCompany!=null)
      <div class="card">
        <div class="card-header">
          <h4 class="card-title text-center"> اعلي شركه قامت بتنفيذ اوردرات</h4>
        </div>

        <div class="card-content collapse show">
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-md-6 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                <h6 class="danger text-bold-600">اسم شركه</h6>
                <h4 class="font-large-1 text-bold-400">{{$highestRecordCompany->company->name_company}}</h4>
              </div>
              <div class="col-md-6 col-12 text-center">
                <h6 class="success text-bold-600">عدد الاوردرات </h6>
                <h4 class="font-large-1 text-bold-400">{{$highestRecordCompany->total}}</h4>
              </div>
            </div>
          </div>
        </div>

      </div>
      @endif
      @if($lowestRecordCompany!=null)
      <div class="card">
        <div class="card-header">
          <h4 class="card-title text-center"> اقل شركه قامت بتنفيذ اوردرات</h4>
        </div>

        <div class="card-content collapse show">
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-md-6 col-12 border-right-blue-grey border-right-lighten-5 text-center">
                <h6 class="danger text-bold-600">اسم شركه</h6>
                <h4 class="font-large-1 text-bold-400">{{$lowestRecordCompany->company->name_company}}</h4>
              </div>
              <div class="col-md-6 col-12 text-center">
                <h6 class="success text-bold-600">عدد الاوردرات </h6>
                <h4 class="font-large-1 text-bold-400">{{$lowestRecordCompany->total}}</h4>
              </div>
            </div>
          </div>
        </div>

    </div>
    @endif

        <div class="row drawing">

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="following-chart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="receive-orders-chart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="posts-visits" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <canvas id="complaints-chart" width="400" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>


    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const labels = @json($labels);
            const followingData = @json(array_values($followingData));
            const receiveOrdersData = @json(array_values($receiveOrdersData));
            const complaintsData = @json(array_values($complaintsData));

            // Chart for both Followings and Receive Orders
            var ctx1 = document.getElementById('posts-visits').getContext('2d');
            var chart1 = new Chart(ctx1, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Followings',
                            data: followingData,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: false,
                            tension: 0.1
                        },
                        {
                            label: 'Receive Orders',
                            data: receiveOrdersData,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            fill: false,
                            tension: 0.1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Count'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            // Chart for Followings only
            var ctx2 = document.getElementById('following-chart').getContext('2d');
            var chart2 = new Chart(ctx2, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Followings',
                            data: followingData,
                            borderColor: 'rgba(75, 192, 192, 1)',
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            fill: false,
                            tension: 0.1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Count'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            // Chart for Receive Orders only
            var ctx3 = document.getElementById('receive-orders-chart').getContext('2d');
            var chart3 = new Chart(ctx3, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Receive Orders',
                            data: receiveOrdersData,
                            borderColor: 'rgba(255, 99, 132, 1)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            fill: false,
                            tension: 0.1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Count'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            // Chart for Complaints only
            var ctx4 = document.getElementById('complaints-chart').getContext('2d');
            var chart4 = new Chart(ctx4, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Complaints',
                            data: complaintsData,
                            borderColor: 'rgba(153, 102, 255, 1)',
                            backgroundColor: 'rgba(153, 102, 255, 0.2)',
                            fill: false,
                            tension: 0.1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Count'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script>
</div>
