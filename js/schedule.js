Vue.createApp({
    data() {
        return {
            events: [
                {
                    title: "コメントその１",
                    dtFrom: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate(), 0, 00),
                    dtTo: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate(), 7, 00),
                },
                {
                    title: "コメントその２",
                    dtFrom: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate(), 12, 00),
                    dtTo: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate(), 13, 30),
                },
                {
                    title: "コメントその３",
                    dtFrom: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate(), 14, 00),
                    dtTo: new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate(), 15, 30),
                }
            ]
        }
    },
    methods: {
        // 時刻からスケジュールのY位置を算出する
        getPosition: function(dateTime){
            const now = new Date()
            // 本日00:00のDateオブジェクト
            const todaysStart = new Date()
            todaysStart.setHours(0, 0, 0, 0)
            // 本日24:00のDateオブジェクト
            const todaysEnd = new Date()
            todaysEnd.setDate(todaysEnd.getDate() + 1)
            todaysEnd.setHours(0, 0, 0, 0)
            // カレンダー最上部からの位置(px)を返す
            if ( dateTime <= todaysStart ) {
                return 0            // 本日00:00以前の場合は最上部
            } else if ( dateTime >= todaysEnd ) {
                return 50 * 24      // 本日24:00以降の場合は最下部
            } else {
                // 本日00:00からの時間数 * 50px
                const hourFromStart = ( dateTime.getHours() + (dateTime.getMinutes() / 60) )
                return hourFromStart * 50
            }
        }
    }
}).mount('#daily-calendar')