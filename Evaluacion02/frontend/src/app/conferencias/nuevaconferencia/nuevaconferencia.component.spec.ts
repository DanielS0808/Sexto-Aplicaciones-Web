import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NuevaconferenciaComponent } from './nuevaconferencia.component';

describe('NuevaconferenciaComponent', () => {
  let component: NuevaconferenciaComponent;
  let fixture: ComponentFixture<NuevaconferenciaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NuevaconferenciaComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(NuevaconferenciaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
