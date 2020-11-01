#7주차 학습회고

새로 배운 내용
- 여러 테이블들을 join하여 원하는 데이터를 출력하는 연습을 함 

문제가 발생하거나 고민한 내용
-ERROR 1045 (28000): Access denied for user 'admin'@'localhost' (using password: YES)
이런 에러가 발생하였음

해결 과정
- (using password: YES) <- 이 부분 YES로 되어있으면 password가 틀린 것 이라고 해서 비밀번호를 바꿔 넣었더니 해결되었다

참고할 만한 내용
- 테이블 join에 관한 내용 정리되어있는 블로그: https://blog.naver.com/makga87/221758381543

회고
- : 과제를 하면서 table을 join하고 원하는 데이터들을 출력하기 위해 검색도 많이 하고 시행착오를 많이 겪었음.
+ : 이 과정에서 실력이 많이 향상된 것 같다.
! : 아직 php 코드 짜는 건 어려워서 더 많이 연습해야할 것 같다.

내가 정의한 문제
- 부서 정보를 알려주는 dept_info 페이지를 만들어서 부서 이름, 총 직원 수, 각 부서 master의 이름을 출력하도록 함
실습 링크: https://youtu.be/sRyEf8ARtZo
