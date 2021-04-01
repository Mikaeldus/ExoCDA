$.ajax({
    url: "Important/JSon.php",
    dataType: "json",
    success: function(data)
    {
        let result = [];
        let i = 0;

        $.each(data, function (key, val) {
            result[i++] = {
                user_name: val.user_name,
                user_tel: val.user_tel,
                user_groupe: val.user_groupe,
                user_id: val.user_id
            };
        });
        new Vue({
            el:'#app',
            data () {
                return {
                    result: result,
                    listeUser: false,
                    AjoutUser: false,
                    index: true,
                }
            },
            methods: {
                functionList: function () {
                    this.listeUser = !this.listeUser;
                    this.AjoutUser = false;
                    this.index = !this.listeUser;
                },
                functionAdd: function () {
                    this.AjoutUser = !this.AjoutUser;
                    this.listeUser = false;
                    this.index = !this.AjoutUser;
                }
            }
        });
    }
});