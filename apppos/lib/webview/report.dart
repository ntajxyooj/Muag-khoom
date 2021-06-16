import 'package:apppos/config.dart';
import 'package:flutter/material.dart';
import 'package:flutter_webview_plugin/flutter_webview_plugin.dart';
import 'package:url_launcher/url_launcher.dart';
import 'package:http/http.dart' as http;
import 'package:dio/dio.dart';

class Report extends StatefulWidget {
  @override
  _ReportState createState() => _ReportState();
}

class _ReportState extends State<Report> {
  bool loading = true;
  bool hostyes = true;

  void checkingIp() async {
    try {
      BaseOptions options = new BaseOptions(
        baseUrl: ip,
        connectTimeout: 5000,
        receiveTimeout: 3000,
      );
      Dio dio = new Dio(options);
      dio.options.connectTimeout = 5000; // 5s
      Response response = await dio.get(ip);
      // final response = await http.get(url);
      setState(() {
        loading = false;
      });
    } on Exception catch (_) {
      setState(() {
        loading = true;
        hostyes = false;
      });
    }
  }

  @override
  void initState() {
    super.initState();
    checkingIp();
  }

  Widget build(BuildContext context) {
    return loading
        ? Material(
            color: Colors.white,
            child: Center(
              child: hostyes
                  ? CircularProgressIndicator()
                  : Column(
                      mainAxisSize: MainAxisSize.min,
                      children: <Widget>[
                        Text(
                          'ເຊື່ອມຕໍ່ຜິດພາດ/Error connection.!',
                          style: TextStyle(
                              fontSize: 12.0, color: Colors.brown[200]),
                        ),
                        Text(''),
                        Ink(
                          decoration: const ShapeDecoration(
                            color: Colors.lightBlue,
                            shape: CircleBorder(),
                          ),
                          child: IconButton(
                            icon: Icon(Icons.refresh),
                            color: Colors.white,
                            onPressed: () {
                              Navigator.pushReplacement(context,
                                  MaterialPageRoute(builder: (_) => Report()));
                            },
                          ),
                        ),
                      ],
                    ),
            ),
          )
        : WebviewScaffold(
          appBar: new AppBar(
        title: const Text('ລາຍງານການຂາຍ'),
        actions: <Widget>[
        ]
          ),
            url:'${ip_api}products/repaortsale&fromapp_userid=5',
            withJavascript: true,
            allowFileURLs: true,
            hidden: true,
            initialChild: Container(
              color: Colors.white,
              child: const Center(
                child: CircularProgressIndicator(
                  semanticsLabel: 'Waitting....',
                ),
              ),
            ),
          );
  }
}