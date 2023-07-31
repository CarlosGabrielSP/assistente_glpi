   </main>
   <script>
      $(document).ready(function() {
         $('.message').transition('fade down in');

         $('.message .close').on('click', function() {
            $(this)
               .closest('.message')
               .transition('fade');
         });
      });
   </script>
   </body>

   </html>
   <!-- Desenvolvido por Carlos Gabriel S. Pereira - UEST/USTI -->
   <?php unset($_SESSION['notificacao']);
