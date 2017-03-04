declare module WebReports.Model.Primer {
    /** Данный интерфейс нужен для работы модели. */
    export interface PrimerInterForEach extends Control {
        forEachModel: IforEachModel[];
    }
    interface IforEachModel {
        forEachString?: string;
        forEachNumber?: number;
    }
}
module WebReports.Controls.Primer {
    interface IPrimerInterForEach {
        forEachString?: string;
        forEachNumber?: number;
    }
    export class PrimerInterfForEach extends UIComponent {
        constructor(private model: WebReports.Model.Primer.PrimerInterForEach) {
            super();
        }
        public render(container: HTMLElement): void {
            let forEachModule: IPrimerInterForEach[] = [];
            /**
             * Обратите внимание что в условиях цикла this.model.forEachModel.forEach
             * Переменная forEachModel должна совпадать с наименованием в модели
             * с учетом в данном примере места расположения в "content".
             */
            $(container).append("<div class='text-control'> <b>Запустили ПЕРВЫЙ цикл.</b> </div>");
            this.model.forEachModel.forEach((dataforEachModel: Model.Primer.IforEachModel, index: number) => {
                forEachModule.push({
                        forEachString: dataforEachModel.forEachString,
                        forEachNumber: dataforEachModel.forEachNumber
                });
                $(container).append("<div class='text-control'> Переменная - " + forEachModule[index].forEachString + " </div>");
                $(container).append("<div class='text-control'> Переменная - " + forEachModule[index].forEachNumber + " </div>");
            });
            $(container).append("<div class='text-control'> <b>Запустили ВТОРОЙ цикл.</b> </div>");
            forEachModule.forEach((item: number, i: number) => {
                $(container).append("<div class='text-control'> Переменная - " + forEachModule[i].forEachString + " </div>");
                $(container).append("<div class='text-control'> Переменная - " + forEachModule[i].forEachNumber + " </div>");
            });
        }
        public refresh() {
            // Empty
        }
    }
}
