declare module WebReports.Model.Primer {
    export interface PrimerforEach extends Control {
        forEachString: string[];
        forEachNumber: number[];
    }
}
module WebReports.Controls.Primer {
    export class PrimerforEach extends UIComponent {

        constructor(private model: WebReports.Model.Primer.PrimerforEach) {
            super();
        }

        public render(container: HTMLElement): void {
            // Создадим переменные forEachString, forEachNumber и занесем в них значения из нашей модели.
            let forEachString: string[] = this.model.forEachString;
            let forEachNumber: number[] = this.model.forEachNumber;

            /**
             * Параметры:
             * item – очередной элемент массива.
             * i – его номер.
             * arr – массив, который перебирается.
             */

            $(container).append("<div class='text-control'> Выводим текстовые переменные. </div>");
            // Выводим элементы через значение item.
            forEachString.forEach(function(item) {
                $(container).append("<div class='text-control'>" + item  + " </div>");
            });
            $(container).append("<div class='text-control'> <br> </div>");

            $(container).append("<div class='text-control'> Выводим цифры. </div>");
            // Выводим элементы через значение arr и i.
            forEachNumber.forEach(function(item, i, arr) {
                $(container).append("<div class='text-control'>" + arr[i]  + " </div>");
            });
            $(container).append("<div class='text-control'> <br> </div>");

            $(container).append("<div class='text-control'> Выводим цифры в обратном порядке. </div>");
            // Выводим элементы через значение arr и i в обратном порядке.
            forEachNumber.forEach(function(item, i, arr) {
                $(container).append("<div class='text-control'>" + arr[(arr.length - 1) - i]  + " </div>");
            });

            $(container).append("<div class='text-control'> <br> </div>");

            $(container).append("<div class='text-control'> Выводим значения в строчку. </div>");
            let numberStr: string[] = [];
            forEachString.forEach(function(item, i, arr) {
                numberStr[i] = item;
            });
            $(container).append("<div class='text-control'>" + numberStr.toString()  + " </div>");

        }

        public refresh() {
            // Empty
        }
    }
}
