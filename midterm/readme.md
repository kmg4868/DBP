- 개발 환경
  MariaDB / Apache Web Server / Linux / 백엔드:PHP / 프론트엔드:HTML 
  :오픈소스 관계형 DBMS인 MariaDB는 MySQL과 소스 코드가 같고, 호환이 가능하지만 MySQL보다 속도나 성능면에서 더 우수하기 때문에   
   MariaDB를 사용하였고, 가상머신에 리눅스와 서버를 설치하고 통신할 포트의 방화벽을 열어 안전하게 사용할 수 있도록 하였음.
  
  발견한 정보
  - Actor 정보
    : Actor id별 이름과 카테고리별 출연한 작품 제목 정보
      film 테이블, film_category 테이블, film_actor 테이블을 join하여 actor_info 뷰를 만들어 정보 출력
      
  - customer 정보
    : Coustomer_id별 이름, 이메일, 주소, 영화 rental에 지불한 총금액 정보
      payment테이블, customer테이블을 join하고 total amount pay를 col에 넣은 total_amount_pay 뷰를 만들고 
      customer 테이블, total_amount_pay 테이블, address 테이블을 join하여 정보를 출력함
  
  - rental list 정보
    : customer_id 별로 이름, 빌린 영화의 제목, 카테고리 정보
      rental테이블, customer테이블, inventory테이블, film테이블, film_category테이블, category테이블을
      join하여 정보를 출력
      
  - film 정보
    : 제목, 영화 설명, 개봉연도, 길이, 장르(카테고리) 정보
      film 테이블, film_category테이블, category 테이블을 join하여 정보 출력
   
  - 카테고리별 총 수입
    : 카테고리 이름, 총 수입
      rental된 영화를 카테고리별로 묶어 카테고리당 총 얼마의 수입이 있는지에 대한 정보
      category테이블, film_category테이블, film테이블, inventory테이블, rental테이블, payment테이블을
      join하여 정보 출력
      
     동작화면 동영상 링크: https://youtu.be/Ul3y8m28XxA
