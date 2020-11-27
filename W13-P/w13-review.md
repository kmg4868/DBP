##새로 배운 내용
- apache tomcat 서버를 설치해 JSP 사용
- 파일에 중복적으로 나오는 DB 연결정보 부분을 하나의 파일로 변환하고 DBConnection 부분을 불러서 쓰도록 함

##문제가 발생하거나 고민한 내용
- 연동하는 부분에서 ping fail과 'Creating connections to New Oracle.' has encountered a problem. Could not connect to New Oracle. 오류가 발생함

##해결 과정
Driver properties -> Host 부분을 localhost로 수정

##참고할 만한 내용
https://blog.naver.com/631962/220242341297

##회고
[+] 이전에 했던 실습들은 가상머신에 서버를 설치하고 구동시키는 등의 과정이 있어 복잡하고 시간이 오래걸렸지만 이번 실습은 이클립스만 사용하면 돼서 편하다

[-] java를 써본 경험이 없고 한 주 쉬었다고 sql 문을 작성하는 부분에서 오류가 많이 났음

[!] 웹페이지를 따로 띄워서 확인할 필요 없이 이클립스에서 웹에 결과가 출력된 것을 확인할 수 있어 좋았음

#실습 동영상
https://youtu.be/itDPmBcuor4
index 화면에서 emp_no를 입력하고 버튼을 눌러 삭제하는 기능을 추가함
