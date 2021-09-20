@extends('layouts.frame')
@section('content')
<div class="row">
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Email Statistics</h4>
                                    <p class="card-category">Last Campaign Performance</p>
                                </div>
                                <div class="card-body ">
                                    <div id="chartPreferences" class="ct-chart ct-perfect-fourth">
                                    <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-pie" style="width: 100%; height: 100%;"><g class="ct-series ct-series-c"><path d="M131.5,5A117.5,117.5,0,0,0,56.287,32.227L131.5,122.5Z" class="ct-slice-pie" ct:value="11"></path></g><g class="ct-series ct-series-b"><path d="M56.603,31.965A117.5,117.5,0,0,0,109.886,237.995L131.5,122.5Z" class="ct-slice-pie" ct:value="36"></path></g><g class="ct-series ct-series-a"><path d="M109.483,237.919A117.5,117.5,0,1,0,131.5,5L131.5,122.5Z" class="ct-slice-pie" ct:value="53"></path></g><g><text dx="189.98926542043094" dy="128.02886340746272" text-anchor="middle" class="ct-label">53%</text><text dx="74.59573928369292" dy="137.11053087093524" text-anchor="middle" class="ct-label">36%</text><text dx="111.59914718558909" dy="67.22325482393927" text-anchor="middle" class="ct-label">11%</text></g></svg>
                                    </div>
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Bounce
                                        <i class="fa fa-circle text-warning"></i> Unsubscribe
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Campaign sent 2 days ago
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Users Behavior</h4>
                                    <p class="card-category">24 Hours performance</p>
                                </div>
                                <div class="card-body ">
                                    <div id="chartHours" class="ct-chart">
                                        <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="245px" class="ct-chart-line" style="width: 100%; height: 245px;"><g class="ct-grids"><line y1="210" y2="210" x1="50" x2="572" class="ct-grid ct-vertical"></line><line y1="185.625" y2="185.625" x1="50" x2="572" class="ct-grid ct-vertical"></line><line y1="161.25" y2="161.25" x1="50" x2="572" class="ct-grid ct-vertical"></line><line y1="136.875" y2="136.875" x1="50" x2="572" class="ct-grid ct-vertical"></line><line y1="112.5" y2="112.5" x1="50" x2="572" class="ct-grid ct-vertical"></line><line y1="88.125" y2="88.125" x1="50" x2="572" class="ct-grid ct-vertical"></line><line y1="63.75" y2="63.75" x1="50" x2="572" class="ct-grid ct-vertical"></line><line y1="39.375" y2="39.375" x1="50" x2="572" class="ct-grid ct-vertical"></line><line y1="15" y2="15" x1="50" x2="572" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M50,210L50,140.044C71.75,140.044,93.5,116.156,115.25,116.156C137,116.156,158.75,90.563,180.5,90.563C202.25,90.563,224,90.075,245.75,90.075C267.5,90.075,289.25,74.963,311,74.963C332.75,74.963,354.5,67.163,376.25,67.163C398,67.163,419.75,39.863,441.5,39.863C463.25,39.863,485,40.594,506.75,40.594C528.5,40.594,550.25,26.7,572,26.7C593.75,26.7,615.5,17.925,637.25,17.925C659,17.925,680.75,3.787,702.5,3.787C724.25,3.787,746,-20.1,767.75,-20.1L767.75,210Z" class="ct-area" ct:values="[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object]"></path></g><g class="ct-series ct-series-b"><path d="M50,210L50,193.669C71.75,193.669,93.5,172.95,115.25,172.95C137,172.95,158.75,175.144,180.5,175.144C202.25,175.144,224,151.5,245.75,151.5C267.5,151.5,289.25,140.044,311,140.044C332.75,140.044,354.5,128.344,376.25,128.344C398,128.344,419.75,103.969,441.5,103.969C463.25,103.969,485,103.481,506.75,103.481C528.5,103.481,550.25,78.619,572,78.619C593.75,78.619,615.5,77.887,637.25,77.887C659,77.887,680.75,77.4,702.5,77.4C724.25,77.4,746,52.294,767.75,52.294L767.75,210Z" class="ct-area" ct:values="[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object]"></path></g><g class="ct-series ct-series-c"><path d="M50,210L50,204.394C71.75,204.394,93.5,182.456,115.25,182.456C137,182.456,158.75,193.669,180.5,193.669C202.25,193.669,224,183.675,245.75,183.675C267.5,183.675,289.25,163.688,311,163.688C332.75,163.688,354.5,151.744,376.25,151.744C398,151.744,419.75,135.169,441.5,135.169C463.25,135.169,485,134.925,506.75,134.925C528.5,134.925,550.25,102.994,572,102.994C593.75,102.994,615.5,110.063,637.25,110.063C659,110.063,680.75,110.063,702.5,110.063C724.25,110.063,746,85.931,767.75,85.931L767.75,210Z" class="ct-area" ct:values="[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object],[object Object]"></path></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="215" width="65.25" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 65px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">9:00AM</span></foreignObject><foreignObject style="overflow: visible;" x="115.25" y="215" width="65.25" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 65px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">12:00AM</span></foreignObject><foreignObject style="overflow: visible;" x="180.5" y="215" width="65.25" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 65px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">3:00PM</span></foreignObject><foreignObject style="overflow: visible;" x="245.75" y="215" width="65.25" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 65px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">6:00PM</span></foreignObject><foreignObject style="overflow: visible;" x="311" y="215" width="65.25" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 65px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">9:00PM</span></foreignObject><foreignObject style="overflow: visible;" x="376.25" y="215" width="65.25" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 65px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">12:00PM</span></foreignObject><foreignObject style="overflow: visible;" x="441.5" y="215" width="65.25" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 65px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">3:00AM</span></foreignObject><foreignObject style="overflow: visible;" x="506.75" y="215" width="65.25" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 65px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">6:00AM</span></foreignObject><foreignObject style="overflow: visible;" y="185.625" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">0</span></foreignObject><foreignObject style="overflow: visible;" y="161.25" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">100</span></foreignObject><foreignObject style="overflow: visible;" y="136.875" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">200</span></foreignObject><foreignObject style="overflow: visible;" y="112.5" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">300</span></foreignObject><foreignObject style="overflow: visible;" y="88.125" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">400</span></foreignObject><foreignObject style="overflow: visible;" y="63.75" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">500</span></foreignObject><foreignObject style="overflow: visible;" y="39.375" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">600</span></foreignObject><foreignObject style="overflow: visible;" y="15" x="10" height="24.375" width="30"><span class="ct-label ct-vertical ct-start" style="height: 24px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">700</span></foreignObject><foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" style="height: 30px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">800</span></foreignObject></g></svg>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Open
                                        <i class="fa fa-circle text-danger"></i> Click
                                        <i class="fa fa-circle text-warning"></i> Click Second Time
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">2017 Sales</h4>
                                    <p class="card-category">All products including Taxes</p>
                                </div>
                                <div class="card-body ">
                                    <div id="chartActivity" class="ct-chart">
                                        <svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="245px" class="ct-chart-bar" style="width: 100%; height: 245px;"><g class="ct-grids"><line y1="210" y2="210" x1="50" x2="410" class="ct-grid ct-vertical"></line><line y1="188.33333333333334" y2="188.33333333333334" x1="50" x2="410" class="ct-grid ct-vertical"></line><line y1="166.66666666666666" y2="166.66666666666666" x1="50" x2="410" class="ct-grid ct-vertical"></line><line y1="145" y2="145" x1="50" x2="410" class="ct-grid ct-vertical"></line><line y1="123.33333333333333" y2="123.33333333333333" x1="50" x2="410" class="ct-grid ct-vertical"></line><line y1="101.66666666666667" y2="101.66666666666667" x1="50" x2="410" class="ct-grid ct-vertical"></line><line y1="80" y2="80" x1="50" x2="410" class="ct-grid ct-vertical"></line><line y1="58.33333333333334" y2="58.33333333333334" x1="50" x2="410" class="ct-grid ct-vertical"></line><line y1="36.66666666666666" y2="36.66666666666666" x1="50" x2="410" class="ct-grid ct-vertical"></line><line y1="15" y2="15" x1="50" x2="410" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><line x1="60" x2="60" y1="210" y2="92.56666666666666" class="ct-bar" ct:value="542"></line><line x1="90" x2="90" y1="210" y2="114.01666666666667" class="ct-bar" ct:value="443"></line><line x1="120" x2="120" y1="210" y2="140.66666666666669" class="ct-bar" ct:value="320"></line><line x1="150" x2="150" y1="210" y2="41" class="ct-bar" ct:value="780"></line><line x1="180" x2="180" y1="210" y2="90.18333333333334" class="ct-bar" ct:value="553"></line><line x1="210" x2="210" y1="210" y2="111.85" class="ct-bar" ct:value="453"></line><line x1="240" x2="240" y1="210" y2="139.36666666666667" class="ct-bar" ct:value="326"></line><line x1="270" x2="270" y1="210" y2="115.96666666666667" class="ct-bar" ct:value="434"></line><line x1="300" x2="300" y1="210" y2="86.93333333333334" class="ct-bar" ct:value="568"></line><line x1="330" x2="330" y1="210" y2="77.83333333333334" class="ct-bar" ct:value="610"></line><line x1="360" x2="360" y1="210" y2="46.19999999999999" class="ct-bar" ct:value="756"></line><line x1="390" x2="390" y1="210" y2="16.083333333333343" class="ct-bar" ct:value="895"></line></g><g class="ct-series ct-series-b"><line x1="70" x2="70" y1="210" y2="120.73333333333333" class="ct-bar" ct:value="412"></line><line x1="100" x2="100" y1="210" y2="157.35" class="ct-bar" ct:value="243"></line><line x1="130" x2="130" y1="210" y2="149.33333333333334" class="ct-bar" ct:value="280"></line><line x1="160" x2="160" y1="210" y2="84.33333333333333" class="ct-bar" ct:value="580"></line><line x1="190" x2="190" y1="210" y2="111.85" class="ct-bar" ct:value="453"></line><line x1="220" x2="220" y1="210" y2="133.51666666666665" class="ct-bar" ct:value="353"></line><line x1="250" x2="250" y1="210" y2="145" class="ct-bar" ct:value="300"></line><line x1="280" x2="280" y1="210" y2="131.13333333333333" class="ct-bar" ct:value="364"></line><line x1="310" x2="310" y1="210" y2="130.26666666666665" class="ct-bar" ct:value="368"></line><line x1="340" x2="340" y1="210" y2="121.16666666666667" class="ct-bar" ct:value="410"></line><line x1="370" x2="370" y1="210" y2="72.19999999999999" class="ct-bar" ct:value="636"></line><line x1="400" x2="400" y1="210" y2="59.41666666666666" class="ct-bar" ct:value="695"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="50" y="215" width="30" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 30px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Jan</span></foreignObject><foreignObject style="overflow: visible;" x="80" y="215" width="30" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 30px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Feb</span></foreignObject><foreignObject style="overflow: visible;" x="110" y="215" width="30" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 30px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Mar</span></foreignObject><foreignObject style="overflow: visible;" x="140" y="215" width="30" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 30px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Apr</span></foreignObject><foreignObject style="overflow: visible;" x="170" y="215" width="30" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 30px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Mai</span></foreignObject><foreignObject style="overflow: visible;" x="200" y="215" width="30" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 30px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Jun</span></foreignObject><foreignObject style="overflow: visible;" x="230" y="215" width="30" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 30px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Jul</span></foreignObject><foreignObject style="overflow: visible;" x="260" y="215" width="30" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 30px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Aug</span></foreignObject><foreignObject style="overflow: visible;" x="290" y="215" width="30" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 30px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Sep</span></foreignObject><foreignObject style="overflow: visible;" x="320" y="215" width="30" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 30px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Oct</span></foreignObject><foreignObject style="overflow: visible;" x="350" y="215" width="30" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 30px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Nov</span></foreignObject><foreignObject style="overflow: visible;" x="380" y="215" width="30" height="20"><span class="ct-label ct-horizontal ct-end" style="width: 30px; height: 20px" xmlns="http://www.w3.org/1999/xhtml">Dec</span></foreignObject><foreignObject style="overflow: visible;" y="188.33333333333334" x="10" height="21.666666666666668" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">0</span></foreignObject><foreignObject style="overflow: visible;" y="166.66666666666669" x="10" height="21.666666666666668" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">100</span></foreignObject><foreignObject style="overflow: visible;" y="145" x="10" height="21.666666666666664" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">200</span></foreignObject><foreignObject style="overflow: visible;" y="123.33333333333333" x="10" height="21.66666666666667" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">300</span></foreignObject><foreignObject style="overflow: visible;" y="101.66666666666667" x="10" height="21.666666666666657" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">400</span></foreignObject><foreignObject style="overflow: visible;" y="80" x="10" height="21.66666666666667" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">500</span></foreignObject><foreignObject style="overflow: visible;" y="58.33333333333334" x="10" height="21.666666666666657" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">600</span></foreignObject><foreignObject style="overflow: visible;" y="36.66666666666666" x="10" height="21.666666666666686" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">700</span></foreignObject><foreignObject style="overflow: visible;" y="15" x="10" height="21.666666666666657" width="30"><span class="ct-label ct-vertical ct-start" style="height: 22px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">800</span></foreignObject><foreignObject style="overflow: visible;" y="-15" x="10" height="30" width="30"><span class="ct-label ct-vertical ct-start" style="height: 30px; width: 30px" xmlns="http://www.w3.org/1999/xhtml">900</span></foreignObject></g></svg>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Tesla Model S
                                        <i class="fa fa-circle text-danger"></i> BMW 5 Series
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-check"></i> Data information certified
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card  card-tasks">
                                <div class="card-header ">
                                    <h4 class="card-title">Tasks</h4>
                                    <p class="card-category">Backend development</p>
                                </div>
                                <div class="card-body ">
                                    <div class="table-full-width">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                                    </td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" checked>
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="">
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Read "Following makes Medium better"</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="form-check">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="checkbox" value="" disabled>
                                                                <span class="form-check-sign"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                    <td>Unfollow 5 enemies from twitter</td>
                                                    <td class="td-actions text-right">
                                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-link">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-link">
                                                            <i class="fa fa-times"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer ">
                                    <hr>
                                    <div class="stats">
                                        <i class="now-ui-icons loader_refresh spin"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

@endsection